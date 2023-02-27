<?php

namespace App\Interfaces;

interface MemberRepositoryInterface 
{
    public function createMember(array $memberDetails);
    public function delete(array $memberId);
}