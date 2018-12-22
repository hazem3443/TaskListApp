<?php

namespace App\Http\Controllers;
//Libraries
use Illuminate\Http\Request;

use App\Task;//models

class TasksEdit extends Controller
{
    //
    public function edit($id) {
    $tasks = Task::findOrFail($id);
    $tasks->name = 'new Name';
    $tasks->save();

    return view('layouts.tasks', [
        'tasks' => $tasks 
    ]);
}

}
