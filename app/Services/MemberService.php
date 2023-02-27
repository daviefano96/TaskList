<?php 

namespace App\Services;
    use App\Interfaces\MemberRepositoryInterface;
 

class MemberService{

    private MemberRepositoryInterface $MemberRepository;

    public function __construct(MemberRepositoryInterface $MemberRepository) 
    {
        $this->MemberRepository = $MemberRepository;
    }

    public function createMember($request){
        $this->MemberRepository->createMember($request);
     }

     public function leaveTask($request){
        $this->MemberRepository->delete($request);
     }
}