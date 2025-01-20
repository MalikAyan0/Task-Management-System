@extends('layouts.app')
@section('title', 'Dashboard')
@section('header')
    Dashboard
@endsection
@section('content')
    @php
        $userId = Auth::id();

        $totalTasks = App\Models\Task::where('user_id', $userId)->count();
        $pendingTasks = App\Models\Task::where('user_id', $userId)->where('status', 'Pending')->count();
        $inProgressTasks = App\Models\Task::where('user_id', $userId)->where('status', 'In Progress')->count();
        $completedTasks = App\Models\Task::where('user_id', $userId)->where('status', 'Completed')->count();
    @endphp

    <h2>Welcome to your Dashboard</h2>
    <div class="dashboard-cards">
        <div class="card">
            <h3>Total Tasks</h3>
            <p>{{ $totalTasks }}</p>
        </div>
        <div class="card">
            <h3>Completed Tasks</h3>
            <p>{{ $completedTasks }}</p>
        </div>
        <div class="card">
            <h3>Pending Tasks</h3>
            <p>{{ $pendingTasks }}</p>
        </div>
        <div class="card">
            <h3>In Progress</h3>
            <p>{{ $inProgressTasks }}</p>
        </div>
    </div>
@endsection

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
    }

    .content {
        padding: 2rem;
    }

    h2 {
        margin-bottom: 2rem;
        color: #ffffff;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .card {
        background-color: #16213e;
        color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .card h3 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .card p {
        font-size: 2rem;
        font-weight: bold;
    }

    .card:hover {
        background-color: #0f3460;
    }

    @media (max-width: 768px) {
        .dashboard-cards {
            grid-template-columns: 1fr;
        }
    }
</style>
