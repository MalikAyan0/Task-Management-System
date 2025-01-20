@extends('layouts.app')
@section('title', 'My Tasks')
@section('header')
    My Tasks
@endsection
@section('content')
    <form action="{{ route('tasks.create') }}" method="GET">
        <button type="submit" class="add-task-btn">Add Task</button>
    </form>
    <h2>My Tasks</h2>
    <div class="task-list">
        @foreach ($tasks as $task)
            <div class="task">
                <div class="task-info">
                    <p><strong>Title:</strong> {{ $task->title }}</p>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Status:</strong> {{ $task->status }}</p>
                    <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d F Y') }}</p>
                </div>
                <div class="task-actions">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="edit-task-btn">Edit</a>

                    <button type="button" class="delete-btn" data-task-id="{{ $task->id }}">Delete</button>
                    <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}"
                        method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const taskId = this.getAttribute('data-task-id');

                if (confirm('Are you sure you want to delete this task?')) {
                    document.getElementById(`delete-form-${taskId}`).submit();
                }
            });
        });
    </script>
@endsection

<style>
    .content {
        padding: 2rem;
        overflow-y: auto;
    }

    .add-task-btn {
        background-color: #21c8d7;
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 1rem;
    }

    .add-task-btn:hover {
        background-color: #17a2b8;
    }

    .task-list {
        background-color: #16213e;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .task {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #0f3460;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease-in-out;
    }

    .task:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    }

    .task-info {
        flex: 1;
        padding-right: 1rem;
    }

    .task-info p {
        color: white;
        font-weight: bold;
    }

    .task-actions .edit-task-btn {
        background-color: #21c8d7;
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        margin-right: 1rem;
    }

    .task-actions .edit-task-btn:hover {
        background-color: #17a2b8;
    }

    .task-actions .delete-btn {
        background-color: #ff6f61;
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .task-actions .delete-btn:hover {
        background-color: #ff4b41;
    }

    @media (max-width: 768px) {
        .task {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
