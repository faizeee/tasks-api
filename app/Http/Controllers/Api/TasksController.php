<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SaveTaskRequest;
use App\Http\Resources\Api\TasksResource;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function createTask(SaveTaskRequest $request){
        try{
            $input = $request->validated();
            Task::create($input);
        }catch(Exception $e){
            return response('Something went Wrong',422);
        }
        return response('Task Created', 200);
    }

    public function taskCompleted(Task $task){
        try {
            $task->is_completed = true;
            $task->save();
        } catch (Exception $e) {
            return response('Something went Wrong', 422);
        }
        return response('Task Status Updated', 200);
    }

    public function getTasks(Request $request)
    {
        $tasks = [];
        try {
            $completed = $request->input('completed',0);
            $tasks = Task::when($completed == 1, fn($q)=>$q->where('is_completed',true))->get();
        } catch (Exception $e) {
            return response(['message'=>'Something went Wrong'], 422);
        }
        return TasksResource::collection($tasks);
    }
}
