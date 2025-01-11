<?php

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});


Route::get('/tasks', function(Task $task){
    return view("index", [
        'tasks' => $task::orderBy('title', 'asc')->get()
    ]);
})->name("tasks.index");


Route::get("/tasks/{id}", function($id)  {
    return view("show", [
      'task' => Task::findOrFail($id)
    ]);
})->name("tasks.show");

// Route::fallback(function () {
//     return "Got a 404";
// });