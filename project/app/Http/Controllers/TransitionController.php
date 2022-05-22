<?php

namespace App\Http\Controllers;

use App\Models\Transition;
use App\Traits\Media;
use App\Traits\TransitionTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransitionRequest;
use App\Http\Requests\UpdateTransitionRequest;

class TransitionController extends Controller
{
    use Media, TransitionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transitions.index', [
            'transitions' => Transition::paginate(config('constant.common_values.paginate_default')),
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
        $custom_validate = $this->validateTransitionPeriodTime($request);
        if ($custom_validate === true) {
            $url_profile = '';
            if ($file = $request->file('decided_img')) {
                $url_profile = $this->saveFile($file);
            }
            $transition = Transition::create([
                'member_id' => $request->member_id,
                'department_id' => $request->department_id,
                'user_id' => Auth::id(),
                'decided_img' => $url_profile,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            $message = $this->updateEndDateNearestTransition($transition);
            return redirect()->back()->with('status', 'Transition has been create successfully!' . $message);
        } else {
            return $custom_validate;
        }
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
        $transition->member_id = $request->member_id;
        $transition->department_id = $request->department_id;
        $transition->user_id = Auth::id();
        $transition->start_date = $request->start_date;
        $transition->end_date = $request->end_date;
        $custom_validate = $this->validateTransitionPeriodTime($request, $transition->id);
        if ($custom_validate === true) {
            if ($file = $request->file('decided_img')) {
                $this->deleteOldFile($transition->decided_img);
                $transition->decided_img = $this->saveFile($file);
            }
            if ($transition->isDirty()) {
                $transition->save();
                return redirect()->route('admin.transitions.edit', $transition)
                    ->with('status', 'Transition has been update successfully!');
            } else {
                return redirect()->route('admin.transitions.edit', $transition);
            }
        } else {
            return $custom_validate;
        }
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
        return redirect()->route('admin.transitions.index', $transition)
            ->with('status', 'Transition has been delete successfully!');
    }
}
