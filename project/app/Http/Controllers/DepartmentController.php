<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::withCount(['transitions' => function ($query) {
            $query->whereDate('start_date', '<=', Carbon::today())
                ->where(function ($query1) {
                    $query1->whereDate('end_date', '>=', Carbon::today())
                        ->orWhereNull('end_date');
                });
        }])
            ->paginate(config('constant.common_values.paginate_default'));
        return view('admin.departments.index', [
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('status', 'Department has been create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', [
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->name = $request->name;
        $department->address = $request->address;
        $department->description = $request->description;
        $department->save();
        return redirect()->route('admin.departments.edit', $department)
            ->with('status', 'Department has been update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index', $department)
            ->with('status', 'Department has been delete successfully!');
    }
}
