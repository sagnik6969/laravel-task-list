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
// if we are not passing any data to view then we can use Route::view
// order of the routes matter. routes defined before gets priority.



Route::get('/tasks/{id}', function ($id) {

  $task = \App\Models\Task::findOrFail($id);

  if (!$task) {
    abort(Illuminate\Http\Response::HTTP_NOT_FOUND);
  }
  return view('show', ['task' => $task]);
})->name('tasks.show');



Route::post('/tasks', function (Illuminate\Http\Request $request) {

  // dd('Form submitted successfully');
  // dd => dump and die
  dd($request->all());
  // used to print all the submitted attributes

})->name('tasks.store');