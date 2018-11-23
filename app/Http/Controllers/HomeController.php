<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class HomeController extends Controller
{
    function showHome(){
        $todo = Todo::where('user_id', session('user')->id)
                    ->where('status', 'Incomplete')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    //->get();
        return view('Home.todolist', ['todos'=>$todo]);
    }

    function showAbout(){
        return view('Home.about');
    }

    function showCompletedTodo(){
        $completedtodo = Todo::where('user_id', session('user')->id)
                    ->where('status', 'Complete')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    //->get();
        return view('Home.completedTodolist', ['todos'=>$completedtodo]);
    }

    function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('show-signin');
    }
}
