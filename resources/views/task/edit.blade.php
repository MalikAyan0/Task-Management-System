@extends('layouts.app')
@section('title', 'Edit Task')
@section('header')
    Edit Task
@endsection
@section('content')

    <div class="content">
        <h2>Edit Task</h2>
        <div class="task-list">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="task-form">
                @csrf
                @method('PUT')
                <div class="task">
                    <div class="task-info">
                        <label for="task-title"><strong>Task Title</strong></label>
                        <input type="text" id="task-title" name="title" value="{{ old('title', $task->title) }}" required
                            class="form-control"><br>

                        <label for="task-desc"><strong>Description</strong></label>
                        <textarea id="task-desc" name="description" rows="4" required class="form-control">{{ old('description', $task->description) }}</textarea><br>

                        <label for="task-status"><strong>Status</strong></label>
                        <select id="task-status" name="status" class="form-control">
                            <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                                Pending</option>
                            <option value="In Progress"
                                {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                                Completed</option>
                        </select><br>


                        <label for="task-due"><strong>Due Date</strong></label>
                        <input type="date" id="task-due" name="due_date"
                            value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required
                            class="form-control"><br>

                        <button type="submit" class="add-task-btn">Update Task</button>
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
