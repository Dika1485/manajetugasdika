<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function read(){
        $task = Task::all();
        return view('index', ['task' => $task]);
    }
    public function read_id($id){
    	$task = Task::where('id',$id)->get();
        if($task->count()==1){
    	    return view('update', ['task' => $task]);
        }
        return redirect(url('/tasks'));
    }
    public function create(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'max:255'],
            'status' => ['required','boolean'],
        ]);
        if($validated){
            $task=new Task();
            $task->title=$request->post('title');
            $task->description=$request->post('description');
            $task->status=($request->post('status'));
            $task->save();
        }
        return redirect(url('/tasks'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'max:255'],
            'status' => ['required','boolean'],
        ]);
        if($validated){
            $task = Task::findOrFail($id);
            $task->title=$request->post('title');
            $task->description=$request->post('description');
            $task->status=($request->post('status'));
            $task->save();
        }
        return redirect(url('/tasks'));
    }
    public function delete($id){
    	$task = Task::findOrFail($id);
        $task->delete();
    	return redirect(url('/tasks'));
    }
    public function read_com(){
        $task = Task::where('status',1)->get();
        return view('index1', ['task' => $task]);
    }
    public function read_incom(){
        $task = Task::where('status',0)->get();
        return view('index2', ['task' => $task]);
    }
    public function update_status($id){
    	$task = Task::findOrFail($id);
    	$task->status=!$task->status;
        $task->save();
    	return redirect(url('/tasks'));
    }
}
