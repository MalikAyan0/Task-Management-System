<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class TasksController extends Controller
{
    public function index()
    {
        try {
            $tasks = Task::where('user_id', auth()->id())->get();
            return view('task.index', compact('tasks'));
        } catch (\Exception $e) {
            Log::error('Error fetching tasks: ' . $e->getMessage());
            return redirect()->route('tasks.index')->with('error', 'Failed to retrieve tasks.');
        }
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'status' => 'required|in:Pending,In Progress,Completed',
                'due_date' => 'required|date',
            ]);

            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' => $request->due_date,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing task: ' . $e->getMessage());
            return redirect()->route('tasks.create')->with('error', 'Failed to create task.');
        }
    }
    public function edit($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Task not found.');
            }

            return view('task.edit', compact('task'));
        } catch (\Exception $e) {
            Log::error('Error fetching task for edit: ' . $e->getMessage());
            return redirect()->route('tasks.index')->with('error', 'Failed to fetch task for editing.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'status' => 'required|in:Pending,In Progress,Completed',
                'due_date' => 'required|date',
            ]);

            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Task not found.');
            }

            $task->update($request->all());

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating task: ' . $e->getMessage());
            return redirect()->route('tasks.edit', $id)->with('error', 'Failed to update task.');
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Task not found.');
            }

            $task->delete();

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting task: ' . $e->getMessage());
            return redirect()->route('tasks.index')->with('error', 'Failed to delete task.');
        }
    }
}
