<?php

use Illuminate\Http\Response;
// Response::HTTP_NOT_FOUND => this line needs above import
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
  // => route keyword is used to redirect ot named routes
});

Route::get('/tasks', function () {

  $tasks = \App\Models\Task::all();
  // get all the tasks from the database
  $tasks = \App\Models\Task::latest()->get();
  // to get the latest records
  // Query builders used to build sql queries in php
  // Query builders are followed by a ->get().
  // We can write a chain of methods
  //https://laravel.com/docs/10.x/queries

  $tasks = \App\Models\Task::latest()
    ->where('completed', true)
    ->get();
  // Example of query builders
  // latest articles where completed column is true

  return view('index', [
    'tasks' => $tasks
  ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {

  // $task = \App\Models\Task::find($id);
  //find() => helps us to find a record by primary key 
  $task = \App\Models\Task::findOrFail($id);
  //if the task is not found then the request will fail with a status code 404   


  if (!$task) {
    abort(Response::HTTP_NOT_FOUND);
    // returns a 404 not found error
    //need to import Illuminate\Http\Response;
  }
  return view('show', ['task' => $task]);

})->name('tasks.show');
