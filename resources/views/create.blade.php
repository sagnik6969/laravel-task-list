@extends('layouts.app')

@section('title', 'Add task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        {{-- @csrf is used to generate csrf token => prevents cross site scripting attack --}}
        {{-- when you submit the form the csrf token automatically gets submitted and laravel authmatically
            verifies the token. 
        csrf attack => And it happens when a malicious website or script will send a request to a different website on behalf
         of the logged in user. So this essentially means that someone tries to send a request on behalf of you basically to this website, --}}
        {{-- csrf tokens are must in laravel
            if you dont include csrf tokens you will get a 419 error --}}

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" name="long_description" id="long_description" rows="10"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Add task</button>
        </div>
    </form>
@endsection
