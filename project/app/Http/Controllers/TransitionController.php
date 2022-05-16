<?php

namespace App\Http\Controllers;

use App\Models\Transition;
use App\Http\Requests\StoreTransitionRequest;
use App\Http\Requests\UpdateTransitionRequest;

class TransitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transitions.index', [
            'transitions' => Transition::paginate(config('constant.common_values.paginate_default'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransitionRequest $request)
    {
        $transition = Transition::create([
            'member_id' => $request->member_id,
            'department_id' => $request->department_id,
            'user_id' => $request->user_id,
            'decided_img' => $request->decided_img,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->back()->with('status', 'Transition has been create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transition  $transition
     * @return \Illuminate\Http\Response
     */
    public function show(Transition $transition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transition  $transition
     * @return \Illuminate\Http\Response
     */
    public function edit(Transition $transition)
    {
        return view('admin.transitions.edit', [
            'transition' => $transition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransitionRequest  $request
     * @param  \App\Models\Transition  $transition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransitionRequest $request, Transition $transition)
    {
        $member->member_id = $request->member_id;
        $member->department_id = $request->department_id;
        $member->user_id = $request->user_id;
        $member->decided_img = $request->decided_img;
        $member->start_date = $request->start_date;
        $member->end_date = $request->end_date;
        $member->save();
        return redirect()->route('admin.transitions.edit', $member)
            ->with('status', 'Transition has been update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transition  $transition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transition $transition)
    {
        $transition->delete();
        return redirect()->route('admin.transitions.index', $member)
            ->with('status', 'Transition has been delete successfully!');
    }
}
