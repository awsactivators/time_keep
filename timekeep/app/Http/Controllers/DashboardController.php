<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type'); // 'project' or 'task'
        $status = $request->input('status');
        $date = $request->input('date');

        $data = collect();

        if ($type === 'project') {
            $query = Project::where('user_id', auth()->id());

            if ($status) {
                $query->where('status', $status);
            }

            if ($date) {
                $query->whereDate('due_date', $date);
            }

            $data = $query->orderBy('due_date', 'desc')->get();
        }

        if ($type === 'task') {
            $query = Task::where('user_id', auth()->id());

            if ($status) {
                $query->where('status', $status);
            }

            if ($date) {
                $query->whereDate('date', $date);
            }

            $data = $query->orderBy('date', 'desc')->get();
        }

        return view('dashboard', compact('data', 'type', 'status', 'date'));
    }
}
