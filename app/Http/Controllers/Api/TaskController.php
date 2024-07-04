<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = Auth::id();
        $task->status = $request->input('status', false);
        $task->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->input('status', false);
        $task->save();

        return response()->json(['message' => 'Task updated successfully', 'task' => $task], 200);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
