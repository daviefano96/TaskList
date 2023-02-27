<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubtaskService;
use App\Http\Requests\SubtaskRequest;
use App\Models\Task;

class SubtaskController extends Controller
{
    protected $SubtaskService;

    public function __construct(SubtaskService $SubtaskService)
    {
        $this->SubtaskService = $SubtaskService;
    }

    public function addsubtask(SubtaskRequest $request){
        $this->SubtaskService->addsubtask($request->validated());

        return back()->with('success', 'Added Subtask');
    }   

    public function editsubtask(Request $request){
        $this->SubtaskService->editsubtask($request);

        return back()->with('success', 'Editted Subtask');
    }   

    public function unfinish(Request $request)
    {
        $this->SubtaskService->unfinish($request->data);
        return response()->json($request->data);
    }

    public function finish(Request $request)
    {
        $this->SubtaskService->finish($request->data);
        return response()->json($request->data);
    }

    public function delete($taskId){
        $this->SubtaskService->delete($taskId);
        return back()->with('success', 'Deleted Subtask');

    }

    

}
