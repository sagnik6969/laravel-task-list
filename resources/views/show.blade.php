@extends('layouts.app')
<!-- 
    template inheritance 
    the path should be separated by "."
-->
@section('title',$task->title)
<!-- no need to close section that does not contain any html -->

@section('content')
<!-- this section will replace the @yield('content') in app.blade.php -->
@foreach ($task as $key => $value )
<li>
    {{$key}} : {{$value}}
</li>
@endforeach
@endsection