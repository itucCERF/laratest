<?php

namespace App\Repositories;

use App\Models\Member;
use App\Repositories\Interfaces\MemberRepositoryInterface;

class MemberRepository implements MemberRepositoryInterface
{
    public function all()
    {
        return Member::all();
    }

    public function getSelectArray()
    {
        return Member::pluck('name', 'id');
    }
}