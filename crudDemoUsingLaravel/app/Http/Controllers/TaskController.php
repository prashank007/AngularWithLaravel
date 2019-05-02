<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Rules\Validation;


class TaskController extends Controller
{
    public function index(){
        return Task::all();

    }
    public function show($id){
        return Task::find($id);
    }   
    public function store(Request $request){
        $validatedData = $request->validate([
       //     'title' => ["required",new Validation],
        ]);
        return Task::create($request->all());
    }
    public function update(Request $request,$id){

        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }
    public function destroy(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->delete();
        return 204;
    }
    
}
