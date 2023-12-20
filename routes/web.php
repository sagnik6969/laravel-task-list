<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  $tasks = \App\Models\Task::all();
  return view('index', [
    'tasks' => $tasks
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create');

Route::get('/tasks/{id}', function ($id) {

  $task = \App\Models\Task::findOrFail($id);

  if (!$task) {
    abort(Illuminate\Http\Response::HTTP_NOT_FOUND);
  }
  return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (Illuminate\Http\Request $request) {

  // to validate the data
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  // only the attributes which are mentioned in the config array will be passed to $data.
  // use | to separate the rules.
  // If the validation passes the execution will continue. If the validation fails laravel will
  // redirect the user to the previous page from where where request was made. and add the errors
  // in a session variable called $errors.
  // we can access the errors in the $errors variables in blade

  // Create a new task model
  $task = new \App\Models\Task();
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save(); // Saves the model to the database

  // redirect to the newly created task
  return redirect()->route('tasks.show', [
    'id' => $task->id
  ]);

  

})->name('tasks.store');

