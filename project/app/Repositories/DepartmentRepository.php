<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function all()
    {
        return Department::all();
    }

    public function getSelectArray()
    {
        return Department::pluck('name', 'id');
    }
}