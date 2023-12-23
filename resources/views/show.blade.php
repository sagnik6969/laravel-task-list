@extends('layouts.app')
<!--
    template inheritance
    the path should be separated by "."
-->
@section('title', $task->title)
<!-- no need to close section that does not contain any html -->

@section('content')

    <a href="{{ route('tasks.index') }}"> ← Go back to task list</a>

    <p class="text-secondary">Task created {{ $task->created_at->diffForHumans() }} &bullet; Updated
        {{ $task->updated_at->diffForHumans() }}

        <!-- this section will replace the @yield('content') in app.blade.php -->
        {{-- for each loop with key value pare wont work because an object is passed instead of an associatice array --}}
    <p class="text-primary font-weight-bold">{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    {{-- <p>{{ $task->updated_at }}</p> --}}
    <div class="d-flex mt-4">
        <div class="mr-2">
            <a class="btn btn-primary" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
        </div>

        <div class="mr-2">
            <form action="{{ route('tasks.toggle-complete', [
                'task' => $task->id,
            ]) }}"
                method="POST">
                @csrf
                @method('put')
                <button class="btn btn-secondary mb-4">
                    Mark as {{ $task->completed ? 'not complete' : 'complete' }}
                </button>
            </form>
        </div>

        <div class="mr-2">
            <form action="{{ route('tasks.destroy', [
                'task' => $task->id,
            ]) }}"
                method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
