<?php

namespace App\Traits;

use App\Models\Transition;
use Carbon\Carbon;

trait MemberTrait
{
    /**
     * For Handle get current Transition of Member
     *
     * @return App\Models\Transition $transition
     */
    public function currentTransition()
    {
        return Transition::where('member_id', $this->id)
            ->whereDate('start_date', '<=', Carbon::today())
            ->where(function ($query) {
                $query->whereDate('end_date', '>=', Carbon::today())
                    ->orWhereNull('end_date');
            })
            ->orderBy('start_date', 'desc')
            ->first();
    }

    /**
     * For Handle get current Department of Member
     *
     * @return App\Models\Department $department
     */
    public function currentDepartment()
    {
        return $this->currentTransition() ? $this->currentTransition()->department : '';
    }

    /**
     * For Handle get Transition histories of Member
     *
     * @return $histories
     */
    public function getHistory()
    {
        $histories = Transition::select('departments.name', 'transitions.start_date', 'transitions.end_date')
            ->join('departments', 'transitions.department_id', 'departments.id')
            ->where('transitions.member_id', $this->id)
            ->orderBy('start_date', 'asc')
            ->get();
        return $histories;
    }
}
