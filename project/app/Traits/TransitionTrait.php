<?php

namespace App\Traits;

use App\Models\Transition;
use App\Models\Member;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

trait TransitionTrait
{
    /**
     * For Handle Validate Period time of work from
     *
     * @param $request
     * @param $ignore transition_id
     * @return bool
     */
    public function validateTransitionPeriodTime($request, $ignore = null)
    {
        $transitions = $this->getAllSamePeriodTransition(
            $request->member_id,
            $request->start_date,
            $request->end_date,
            $ignore = null,
        );
        if ($transitions->isNotEmpty()) {
            return $this->validateTransitionPeriod($transitions, $request->department_id);
        }

        return true;
    }

    /**
     * For Handle get all transitions has same period of member
     *
     * @param $member_id, $start_date, $end_date
     *
     * @return $data
     */
    public function getAllSamePeriodTransition($member_id, $start_date, $end_date, $ignore = null)
    {
        $data = Transition::query();
        $data = $data->where('member_id', $member_id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->where(function ($query1) use ($start_date) {
                    $query1->whereDate('end_date', '>', $start_date)
                        ->whereDate('start_date', '<', $start_date)
                        ->whereNotNull('end_date');
                });
                if ($end_date != null) {
                    $query->orWhere(function ($query1) use ($end_date) {
                        $query1->where('end_date', '>', $end_date)
                            ->where('start_date', '<', $end_date)
                            ->whereNotNull('end_date');
                    });
                    $query->orWhere(function ($query1) use ($start_date, $end_date) {
                        $query1->whereDate('start_date', '>', $start_date)
                            ->whereDate('start_date', '<', $end_date);
                    });
                }
            });
        if ($ignore != null) {
            $data = $data->where('id', '<>', $ignore);
        }
        return $data->get();
    }

    /**
     * For Handle check member in department at same time
     *
     * @param App\Models\Transition $list
     * @param $department_id
     * @param MessageBag $message_bag
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function validateTransitionPeriod($list, $department_id)
    {
        $message_bag = new MessageBag;
        foreach ($list as $item) {
            if ($item->department_id == $department_id) {
                $message_bag->add(
                    'start_date & end_date',
                    'This is same period with department_id ' . $department_id . ' in transition_id ' . $item->id
                );
            } else {
                $message_bag->add('start_date & end_date', 'This is same period with transition_id' . $item->id);
            }
        }

        return redirect()->back()->withInput(request()->all())->withErrors($message_bag);
    }

    /**
     * For Handle Update end_date of nearest transition
     *
     * @param App\Models\Transition $transition
     *
     * @return $message
     */
    public function updateEndDateNearestTransition(Transition $transition)
    {
        $message = '';
        $needUpdate = $this->getTransitionNeedUpdate($transition);
        if ($needUpdate) {
            if ($this->updateEndDateTransition($needUpdate, $transition->start_date)) {
                $message .= '<br/>Transition ' . $needUpdate->id . ' has been update End Date';
            }
        }
        $end_date = $this->checkNeedToUpdateEndDate($transition);
        if ($end_date != null) {
            if ($this->updateEndDateTransition($transition, $end_date)) {
                $message .= '<br/>Transition ' . $transition->id . ' has been update End Date';
            }
        }

        return $message;
    }

    /**
     * For Handle get all transitions need to update end_date
     *
     * @param Transition $transition
     *
     * @return $transition
     */
    private function getTransitionNeedUpdate(Transition $transition)
    {
        $data = Transition::where('member_id', $transition->member_id)
            ->where('id', '<>', $transition->id)
            ->whereDate('start_date', '<', $transition->start_date)
            ->whereNull('end_date')
            ->orderBy('start_date', 'desc')
            ->first();

        return $data;
    }

    /**
     * For Handle check current transition need to update end_date
     *
     * @param Transition $transition
     *
     * @return $end_date
     */
    private function checkNeedToUpdateEndDate(Transition $transition)
    {
        if ($transition->end_date == null) {
            $data = Transition::where('member_id', $transition->member_id)
                ->where('id', '<>', $transition->id)
                ->whereDate('start_date', '>', $transition->start_date)
                ->orderBy('start_date', 'asc')
                ->first();
            if ($data) {
                return $data->start_date;
            };
        }

        return null;
    }

    /**
     * For Handle update end date of transition
     *
     * @param Transition $transition
     * @param $end_date
     * @return boolean
     */
    private function updateEndDateTransition(Transition $transition, $end_date)
    {
        $transition->end_date = Carbon::parse($end_date)->subDay();
        $transition->save();

        return true;
    }
}
