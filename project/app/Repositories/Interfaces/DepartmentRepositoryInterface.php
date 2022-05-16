<?php

namespace App\Repositories\Interfaces;

use App\Models\Department;

interface DepartmentRepositoryInterface
{
    public function all();

    public function getSelectArray();
}