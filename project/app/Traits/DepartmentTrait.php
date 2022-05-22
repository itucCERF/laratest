<?php

namespace App\Traits;

use App\Models\Transition;
use App\Models\Member;
use Carbon\Carbon;

trait DepartmentTrait
{
    /**
     * For Handle get all current Members of Department
     *
     * @return $members
     */
    public function allCurrentMembers(int $paginate = null)
    {
        $model = new Member();
        $currentTransitions = $this->allCurrentTransitions();
        $members = Member::select($model->getFillable())
            ->whereIn('id', $currentTransitions->pluck('member_id')->toArray());
        if ($paginate == null) {
            return $members->get();
        } else {
            return $members->paginate($paginate);
        }
    }

    /**
     * For Handle get all current Transitions of Department
     *
     * @return $transitions
     */
    public function allCurrentTransitions()
    {
        return Transition::where('department_id', $this->id)
            ->whereDate('start_date', '<=', Carbon::today())
            ->where(function ($query) {
                $query->whereDate('end_date', '>=', Carbon::today())
                    ->orWhereNull('end_date');
            })
            ->get();
    }

    /**
     * For Handle get count current Member of Department
     *
     * @return $count
     */
    public function countCurrentMember()
    {
        $currentTransitions = $this->allCurrentTransitions();
        return Member::whereIn('id', $currentTransitions->pluck('member_id')->toArray())
            ->count();
    }
}
