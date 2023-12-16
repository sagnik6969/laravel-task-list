@extends('layouts.app')
@section('title','The list of tasks');


@section('content')
@forelse($tasks as $task)
<div>
    <a href="{{ route('tasks.show',['id' => $task->id]) }}">{{ $task -> title }}</a>
</div>
<!-- <div>{{ $task -> title }}</div> -->
@empty
<div>No task found</div>
@endforelse
@endsection