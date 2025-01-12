@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <nav>
        <a href="/">Home</a>
    </nav>
    {{ $errors }}
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description", rows="5"></textarea>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description", rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection