@extends('layouts.app')

@section('title', 'Laravel Tasks App')

@section('content')
    <div>
        <a href="{{ route('tasks.create') }}">
            <button>Create Task</button>
        </a>
    </div>
    <div>
        <h1>Tasks App</h1>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>

            </div>
        @empty
            <p>No tasks found</p>
        @endforelse

        @if($tasks->count())
            <nav>
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
    
@endsection
