<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.members.index', [
            'members' => Member::paginate(config('constant.common_values.paginate_default'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'profile' => $request->profile,
            'id_card' => $request->id_card,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with('status', 'Member has been create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', [
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->email = $request->email;
        $member->birthday = $request->birthday;
        $member->address = $request->address;
        $member->profile = $request->profile;
        $member->id_card = $request->id_card;
        $member->notes = $request->notes;
        $member->save();
        return redirect()->route('admin.members.edit', $member)
            ->with('status', 'Member has been update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index', $member)
            ->with('status', 'Member has been delete successfully!');
    }
}
