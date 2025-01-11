@extends('layouts.app')

@section('title', 'Laravel Tasks App')

@section('content')
    <div>
        <h1>Tasks App</h1>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>

            </div>
        @empty
            <p>No tasks found</p>
        @endforelse
    </div><br>
    <div>
        <a href="{{ route('tasks.create') }}">
            <button>Create Task</button>
        </a>
    </div>
@endsection
