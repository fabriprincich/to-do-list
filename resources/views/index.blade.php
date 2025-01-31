@extends('layouts.app')

@section('title', 'Laravel Tasks App')

@section('content')
    <nav class="mb-5">
        <a href="{{ route('tasks.create') }}"
            class="text-grey-700 font-medium underline decoration-grey-500 hover:text-blue-900">
            Create Task
        </a>
    </nav>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </div>
        @empty
            <p>No tasks found</p>
        @endforelse

        @if($tasks->count())
            <nav class="mt-5">
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
    
@endsection
