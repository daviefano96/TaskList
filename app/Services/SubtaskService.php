<?php 

namespace App\Services;
    use App\Interfaces\TaskRepositoryInterface;
 

class SubtaskService{

    private TaskRepositoryInterface $TaskRepository;

    public function __construct(TaskRepositoryInterface $TaskRepository) 
    {
        $this->TaskRepository = $TaskRepository;
    }

    public function addsubtask($request){
       $this->TaskRepository->createTask($request);
    }

    public function editsubtask($request){
        $this->TaskRepository->updateTask($request->id, $data =[
            'name' => $request->name,
        ]);
     }
    public function unfinish($taskId){
        $this->TaskRepository->unfinishTask($taskId);
     }
     public function finish($taskId){
        $this->TaskRepository->finishTask($taskId);
     }
     public function delete($taskId){
        $this->TaskRepository->delete($taskId);
     }

    
 
}
