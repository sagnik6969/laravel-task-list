<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  $tasks = \App\Models\Task::all();
  return view('index', [
    'tasks' => $tasks,
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}', function (\App\Models\Task $task) {
  // $task = \App\Models\Task::findOrFail($id);

  // if (!$task) {
  //   abort(Illuminate\Http\Response::HTTP_NOT_FOUND);
  // }
  return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (\App\Http\Requests\TaskRequest $request) {
  // to validate the data
  // $data = $request->validate([
  //   'title' => 'required|max:255',
  //   'description' => 'required',
  //   'long_description' => 'required',
  // ]);

  $data = $request->validated();

  // $task = new \App\Models\Task();
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();

  $task = App\Models\Task::create($data);
  // used to create a task from an associative array

  return redirect()
    ->route('tasks.show', [
      'task' => $task->id,
    ])
    ->with('success', 'Task created successfully');
})->name('tasks.store');

// Editing tasks

// Route model binding => laravel automatically assign the requested task id to 
// an appropriate task object. If task is not found it will throw a model not found exception
// which in laravel is a 404 page.
// by default $task is considered id of the task in database but that is configurable
// TO change the default key go to \app\models\task.php and create a function called 
// getRouteKeyName() and return the key in form of string. 
Route::get('/tasks/{task}/edit', function (\App\Models\Task $task) {
  // $task = \App\Models\Task::findOrFail($id);
  // if (!$task) {
  //   abort(Illuminate\Http\Response::HTTP_NOT_FOUND);
  // }
  return view('edit', ['task' => $task]);
})->name('tasks.edit');

// PUT request to update something in the server
Route::put('/tasks/{task}', function (\App\Models\Task $task, \App\Http\Requests\TaskRequest $request) {
  // $data = $request->validate([
  //   'title' => 'required|max:255',
  //   'description' => 'required',
  //   'long_description' => 'required',
  // ]);
  // validation will happen before the first line of the route is run.
  // $request->validated() => used to get validated data.
  $data = $request->validated();

  // $task = \App\Models\Task::findOrFail($id);
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();
  // task->save() => here task.save() will automatically update the data in the database

  $task->update($data);
  // used to update a task from an array

  return redirect()
    ->route('tasks.show', [
      'task' => $task->id,
    ])
    ->with('success', 'Task edited successfully');
})->name('task.update');

// Form request => extracting the form validation rules to one place.
// php artisan make:request TaskRequest => to create a form request file

// By default changing multiple attributes of a model using array is disabled. to enable it
// add appropriate code to model php file
// protected $fillable = [
//   'title',
//   'description',
//   'long_description'
// ];