<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskSession;

class TaskSessionController extends Controller
{
    //
    public function index(Task $task)
    {
        $sessions = $task->sessions()->orderBy('date', 'desc')->get();
        return view('sessions.index', compact('task', 'sessions'));
    }

    public function create(Task $task)
    {
        return view('sessions.create', compact('task'));
    }

    public function store(Request $request, Task $task)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
            'notes' => 'nullable|string',
        ]);

        $timeSpent = null;
        if ($request->start_time && $request->end_time) {
            $start = strtotime($request->start_time);
            $end = strtotime($request->end_time);
            $timeSpent = round(($end - $start) / 3600, 2);
        }

        TaskSession::create([
            'task_id' => $task->id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'time_spent' => $timeSpent,
            'notes' => $request->notes,
        ]);

        return redirect()->route('task-sessions.index', $task->id)
                         ->with('success', 'Session logged successfully.');
    }

    public function destroy(Task $task, TaskSession $session)
    {
        $session->delete();
        return redirect()->route('task-sessions.index', $task->id)
                         ->with('success', 'Session deleted.');
    }

    public function edit(Task $task, TaskSession $session)
    {
        return view('sessions.edit', compact('task', 'session'));
    }


    public function update(Request $request, Task $task, TaskSession $session)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
            'notes' => 'nullable|string',
        ]);

        $timeSpent = null;
        if ($request->start_time && $request->end_time) {
            $start = strtotime($request->start_time);
            $end = strtotime($request->end_time);
            $timeSpent = round(($end - $start) / 3600, 2);
        }

        $session->update([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'time_spent' => $timeSpent,
            'notes' => $request->notes,
        ]);

        return redirect()->route('task-sessions.index', $task->id)->with('success', 'Session updated.');
    }

}
