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
    <p>Task created at: {{ $task->created_at }}</p>
    <p>Last updated at: {{ $task->updated_at }}</p>
    {{ $task->completed ? 'Completed' : 'Not completed' }}
    <br>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
            @csrf
            @method("PUT")
            <button type="submit">
                Mark as {{  $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>

    <div>
        <button>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
        </button>
    </div>
    
    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit">Delete</button>
        </form>
    </div>
    
@endsection
