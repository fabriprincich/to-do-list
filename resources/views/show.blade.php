@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav>
        <a href="/">Home</a>
    </nav>
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    @if ($task->completed == false)
        <p>Task not completed</p>
    @endif
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
@endsection
