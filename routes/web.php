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

  $task = new \App\Models\Task();
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save();

  return redirect()->route('tasks.show', [
    'id' => $task->id
  ])
    ->with('success', 'Task created successfully');
})->name('tasks.store');






// Editing tasks

Route::get('/tasks/{id}/edit', function ($id) {

  $task = \App\Models\Task::findOrFail($id);

  if (!$task) {
    abort(Illuminate\Http\Response::HTTP_NOT_FOUND);
  }
  return view('edit', ['task' => $task]);
})->name('tasks.edit');


// PUT request to update something in the server
Route::put('/tasks/{id}', function ($id, \Illuminate\Http\Request $request) {

  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);

  $task = \App\Models\Task::findOrFail($id);
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save();
  // task->save() => here task.save() will automatically update the data in the database

  return redirect()->route('tasks.show', [
    'id' => $task->id
  ])
    ->with('success', 'Task edited successfully');

})->name('task.update');