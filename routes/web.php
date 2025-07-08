<?php

use App\Http\Requests\TaskRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', function () {  // Redirecciona la ruta para la página principal
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function(Task $task){ // Generara la ruta para la página principal
    return view("index", [
        'tasks' => $task::latest()->paginate(10)
    ]);
})->name("tasks.index");

Route::view('/tasks/create', 'create')->name("tasks.create"); // Genera la vista para la página de creación

Route::get("/tasks/{task}", function(Task $task)  { //  para la página de visualización
    return view("show", [
      'task' => $task
    ]);
})->name('tasks.show');

Route::get("/tasks/{task}/edit", function(Task $task)  {
  return view("edit", [
    'task' => $task
  ]);
})->name('tasks.edit');

Route::post('/tasks', function(TaskRequest $request) { // Crear una nueva tarea
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success','Task created successfully.');
})->name("tasks.store");

Route::put("/tasks/{task}", function(Task $task, TaskRequest $request) { // Actualizar una tarea
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success','Task updated successfully.');
  })->name("tasks.update");


Route::delete("/tasks/{task}", function(Task $task) { // Eliminar una tarea
  $task->delete();
  return redirect()->route("tasks.index")->with("success","Task deleted successfully");
})->name("tasks.destroy");


Route::put("/tasks/{task}/toggle-complete", function(Task $task) { // toggle de tarea completada
  $task->toggleComplete();

  return redirect()->back()->with('success','Task updated successfully.');
})->name('tasks.toggle-complete');