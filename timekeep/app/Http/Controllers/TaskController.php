<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all tasks for the authenticated user
        $tasks = Task::where('user_id', Auth::id())->with('project')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all projects for the authenticated user
        // and pass them to the create task view
        $projects = Project::where('user_id', Auth::id())->get();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Validate the request data
        // The StoreTaskRequest will handle the validation
        // and the rules defined in the request class
        // will be applied to the request data
        // The request class will also handle the authorization
        // and the validation rules
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
            'time_spent' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:incomplete,complete',
            'notes' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        $validated['user_id'] = Auth::id();
        if ($request->start_time && $request->end_time) {
            $start = strtotime($request->start_time);
            $end = strtotime($request->end_time);
            $validated['time_spent'] = round(($end - $start) / 3600, 2);
        }

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task logged!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // Fetch all projects for the authenticated user
        // and pass them to the edit task view
        // The task is passed to the view to pre-fill the form
        $projects = Project::where('user_id', Auth::id())->get();
        return view('tasks.create', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Validate the request data
        // The UpdateTaskRequest will handle the validation
        // and the rules defined in the request class
        // will be applied to the request data
        // The request class will also handle the authorization
        // and the validation rules
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
            'time_spent' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:incomplete,complete',
            'notes' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        if ($request->start_time && $request->end_time) {
            $start = strtotime($request->start_time);
            $end = strtotime($request->end_time);
            $validated['time_spent'] = round(($end - $start) / 3600, 2);
        }

        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Fetch the task and delete it
        // Optionally, to check if the user is authorized to delete the task
        // The task is passed to the view to pre-fill the form
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
