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
  // creates a session variable called 'success' and sets it to 'Task created successfully'
  // when the next request will be made the variable 'success' will be deleted from session 

})->name('tasks.store');

// In laravel session starts when user first visits a website and end when 
// the user closes the browser.
// When you visit a laravel website for the first time it will store the session id in a cookie
// in the subsequent requests laravel can recognize the the user through the session id 
// stored in the cookie.
// session data is stored inside /storage/framework/session
// session data is both stored in browser and in server (/storage/framework/session)

// we can configure how the session data is stored inside the server using /config/session.php
// by default session data is stored in a file. 
// the problem with files is that files cant be shared between servers.
// se redis is preferred for storing session data.


