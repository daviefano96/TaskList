<?php

namespace App\Http\Controllers;

use App\Services\MemberService;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    protected $MemberService;

    public function __construct(MemberService $MemberService)
    {
        $this->MemberService = $MemberService;
    }

    public function createMember(MemberRequest $request){
        $this->MemberService->createMember($request->validated());

        return back()->with('success', 'Added Member');
    }   

    public function leaveTask(MemberRequest $request){
        $this->MemberService->leaveTask($request->validated());

        return redirect('viewtasklist');
    }   
}
