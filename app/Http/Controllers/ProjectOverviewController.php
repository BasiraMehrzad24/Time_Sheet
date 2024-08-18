<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectOverviewController extends Controller
{
    public function __invoke(Project $project): View
    {
        $this->authorize('view', $project);

        $isMember = Auth::user()->can('isMember', $project);

        $users = $project->users()
            ->when($isMember, fn ($query) => $query->where('user_id', Auth::id()))
            ->withCount(['reports' => self::query()])
            ->withSum(['reports' => self::query()], 'hours')
            ->orderBy('reports_sum_hours', 'desc')
            ->get();

        return view('project.overview', compact('users'));
    }

    private function query(): callable
    {
        return function ($query) {
            $date = now()->subMonths(request('prev', 0));

            $query->where('project_id', request('project.id'))
                ->whereMonth('date', $date->month)
                ->whereYear('date', $date->year)
                ->where('status', 2); // approved reports
        };
    }
}
