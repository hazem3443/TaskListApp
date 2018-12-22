<?php

namespace App\Http\Controllers;
//Libraries
use Illuminate\Http\Request;

use App\Task;//models

class TasksController extends Controller
{
    //
    public function index() {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('layouts.tasks', [
        'tasks' => $tasks 
    ]);
}

}
