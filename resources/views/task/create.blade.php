@extends('layouts.app')
@section('title', 'Create Task')
@section('header')
    Create Task
@endsection
@section('content')

    <div class="content">
        <h2>Create New Task</h2>
        <div class="task-list">
            <form id="createTaskForm" method="POST" action="{{ route('tasks.store') }}" class="task-form">
                @csrf
                <div class="task">
                    <div class="task-info">
                        <label for="title"><strong>Task Title</strong></label>
                        <input type="text" id="task-title" name="title" required class="form-control"><br>

                        <label for="description"><strong>Description</strong></label>
                        <textarea id="task-desc" name="description" rows="4" required class="form-control"></textarea><br>

                        <label for="status"><strong>Status</strong></label>
                        <select id="task-status" name="status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select><br>

                        <label for="due_date"><strong>Due Date</strong></label>
                        <input type="date" id="task-due" name="due_date" required class="form-control"><br>

                        <button type="submit" class="add-task-btn">Add Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    .task-info label {
        color: white;
        font-weight: bold;
    }

    .task-info input,
    .task-info select,
    .task-info textarea {
        width: 100%;
        padding: 0.8rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        border: none;
        background-color: #1a1a2e;
        color: white;
    }

    .task-info input[type="date"] {
        background-color: #1a1a2e;
    }

    .task-info button {
        background-color: #21c8d7;
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .task-info button:hover {
        background-color: #17a2b8;
    }

    @media (max-width: 768px) {
        .task {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
