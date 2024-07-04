<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();
        return view('pages.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = Auth::id();
        $task->status = $request->input('status', false);

        $task->save();

        return redirect()->route('tasks.index')->with('message', 'Task added successfully!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = $request->input('status', false);
        $task->save();

        return redirect()->route('tasks.index')->with('message', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully!');
    }
}
