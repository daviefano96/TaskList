<?php 

namespace App\Services;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
 

class UserService{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function signup(array $request)
    {
        try {
            $user = $this->userRepository->createUser($request);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return back()->withErrors([
                    'email' => 'The provided email already exists',
                ]);
            }
        }
    }

    public function login($request){

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            session()->regenerate();
            return true;
        }
        else{
            return false;
        }
        
    }
 
}
