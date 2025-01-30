@extends('layouts.app')

@section('title', $task->title)

@section('navigation')
    <nav>
        <a href="/">Home</a>
    </nav>
@endsection
@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    @if ($task->completed == false)
        <p>Task not completed</p>
    @endif
    <p>Task created at: {{ $task->created_at }}</p>
    <p>Last updated at: {{ $task->updated_at }}</p>

    <button>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
    </button>
    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit">Delete</button>
        </form>
    </div>
    
@endsection
