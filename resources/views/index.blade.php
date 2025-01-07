<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>

        </div>
    @empty
        <p>No tasks found</p>
    @endforelse
</div><br>



<div>
    <button>
        <a href="/login">Login</a>
    </button>
</div>
