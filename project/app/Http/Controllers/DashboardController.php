<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Department;
use App\Models\Transition;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_count = Member::count();
        $departments = Department::select('id', 'name')
            ->withCount(['transitions' => function ($query) {
                $query->whereDate('start_date', '<=', Carbon::today())
                    ->where(function ($query1) {
                        $query1->whereDate('end_date', '>=', Carbon::today())
                            ->orWhereNull('end_date');
                    });
            }])
            ->limit(12)
            ->get();
        $transitions = Transition::orderBy('end_date', 'desc')
            ->limit(5)
            ->get();
        return view('dashboard', [
            'member_count' => $member_count,
            'departments' => $departments,
            'transitions' => $transitions,
        ]);
    }
}
