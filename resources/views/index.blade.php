@extends('layouts.app')
@section('title', 'The list of tasks');


@section('content')
    <div class="mt-3">
        <a class="btn btn-primary" href="/tasks/create">Create Task</a>
    </div>
    @forelse($tasks as $task)
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <h6 class="card-subtitle text-secondary">{{ $task->updated_at->diffForHumans() }}</h6>
                <p class="card-text mb-1">{{ $task->description }}</p>
                <a class="card-link d-block ml-auto" href="{{ route('tasks.show', ['task' => $task->id]) }}">View
                    task</a>
            </div>
        </div>
        <!-- <div>{{ $task->title }}</div> -->
    @empty
        <div>No task found</div>
    @endforelse

    <div class="mt-4">
        @if ($tasks->count())
            {{ $tasks->links('pagination::bootstrap-4') }}
        @endif
    </div>
@endsection
