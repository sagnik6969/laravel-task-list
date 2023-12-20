@extends('layouts.app')

@section('title', 'Add task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        {{-- {{$errors}} --}}
        {{-- all the validation errors will be passes to $errors it is automatically passed --}}
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" name="long_description" id="long_description" rows="10"></textarea>
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
