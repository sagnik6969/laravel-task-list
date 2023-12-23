@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add task')

@section('content')
    {{-- @dump($task) --}}
    <form action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('put')
        @endisset
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{ $task->title ?? old('title') }}" id="title">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="form-group">
            <button class="btn btn-primary">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection
