<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        // Fetch all projects for the authenticated user
        $projects = Project::where('user_id', Auth::id())->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new project
        // dd('It worked!');
        // dd(auth()->user()->role);
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        // Validate the request data
        // The StoreProjectRequest will handle the validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_type' => 'nullable|string|max:100',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:pending,in-progress,completed',
            'link' => 'nullable|url',
            'client_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'price_per_hour' => 'nullable|numeric|min:0',
        ]);

        $validated['user_id'] = Auth::id();
        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // Fetch the project with its tasks
        $project->load('tasks');
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Show the form to edit the project
        return view('projects.create', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Validate the request data
        // The UpdateProjectRequest will handle the validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_type' => 'nullable|string|max:100',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:pending,in-progress,completed',
            'link' => 'nullable|url',
            'client_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'price_per_hour' => 'nullable|numeric|min:0',
        ]);

        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete the project
        // Optionally, to check if the user is authorized to delete the project
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted!');
    }
}
