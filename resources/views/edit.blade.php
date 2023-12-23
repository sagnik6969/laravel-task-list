@extends('layouts.app')

@section('title', 'Edit task')

@section('content')
    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
        @method('put')
        {{-- html doesnot allow put method but you can use put using blade directives in leveral --}}
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{ $task->title }}" id="title">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="form-group">
            <button class="btn btn-primary">Add task</button>
        </div>
    </form>
@endsection
