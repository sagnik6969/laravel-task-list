<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  $tasks = \App\Models\Task::latest()->paginate();
  // to paginate the results
  return view('index', [
    'tasks' => $tasks,
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}', function (\App\Models\Task $task) {

  return view('show', ['task' => $task]);

})->name('tasks.show');

Route::post('/tasks', function (\App\Http\Requests\TaskRequest $request) {

  $data = $request->validated();

  $task = App\Models\Task::create($data);

  return redirect()
    ->route('tasks.show', [
      'task' => $task->id,
    ])
    ->with('success', 'Task created successfully');

})->name('tasks.store');


Route::get('/tasks/{task}/edit', function (\App\Models\Task $task) {

  return view('edit', ['task' => $task]);
})->name('tasks.edit');

// PUT request to update something in the server
Route::put('/tasks/{task}', function (\App\Models\Task $task, \App\Http\Requests\TaskRequest $request) {

  $data = $request->validated();

  $task->update($data);

  return redirect()
    ->route('tasks.show', [
      'task' => $task->id,
    ])
    ->with('success', 'Task edited successfully');

})->name('task.update');

Route::delete('/tasks/{task}', function (\App\Models\Task $task) {
  $task->delete();

  return redirect()->route('tasks.index');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (\App\Models\Task $task) {
  // $task->completed = !$task->completed;
  // $task->save();
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task updated successfully');
  // ->back() => redirected to the page from where the request is made.
})->name('tasks.toggle-complete');


// diffForHumans() => used to convert timestamps into human readable form in blade
// @class(['text-danger' => true]) => used to apply the class conditionally.