<?php

namespace App\Repositories;

use App\Interfaces\MemberRepositoryInterface;
use App\Models\Member;

class MemberRepository implements MemberRepositoryInterface 
{
    public function createMember(array $memberDetails){
        return Member::firstOrCreate($memberDetails);
    }

    public function delete(array $memberDetails){
        return Member::where($memberDetails)->delete();
    }
}