@extends('layouts.app')
<!--
    template inheritance
    the path should be separated by "."
-->
@section('title', $task->title)
<!-- no need to close section that does not contain any html -->

@section('content')

    <!-- this section will replace the @yield('content') in app.blade.php -->
    {{-- for each loop with key value pare wont work because an object is passed instead of an associatice array --}}
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
@endsection
