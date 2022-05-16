<?php

namespace App\Repositories\Interfaces;

use App\Models\Member;

interface MemberRepositoryInterface
{
    public function all();

    public function getSelectArray();
}