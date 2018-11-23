<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\support\Facedes\input;
use App\Todo;

class ManageTodoController extends Controller
{
    public function addTodo(TodoRequest $request){

        date_default_timezone_set('Asia/Dhaka');

        $todo = new Todo();
        $todo->user_id = session('user')->id;
        $todo->todo_name = $request->todo_name;
        $todo->priority = $request->priority;
        $todo->creation_Time = date("F j, Y, g:i a");
        $todo->description = $request->description;
        $todo->status = 'Incomplete';
        $todo->save();

        return redirect(route('showHome'));
    }

    public function updateTodo(TodoRequest $request){
        //dd($request);
        $todo = Todo::where('id', $request->todo_id)->first();
        $todo->todo_name = $request->todo_name;
        $todo->priority = $request->priority;
        $todo->description = $request->description;
        $todo->save();

        return redirect(route('showHome'));
    }

    public function deleteTodo(Request $request){
        $todo = Todo::where('id', $request->todo_id)->first();
        $todo->delete();

        return redirect(route('showCompletedTodo'));
    }

    public function setComplete(Request $request){
        $todo = Todo::where('id', $request->todo_id)->first();
        $todo->status = 'Complete';
        $todo->save();

        return redirect(route('showHome'));
    }


}
