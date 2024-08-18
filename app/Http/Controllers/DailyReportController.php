<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyReportRequest;
use App\Models\DailyReport;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DailyReportController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDailyReportRequest  $request
     * @param  Project  $project
     * @return RedirectResponse
     */
    public function store(StoreDailyReportRequest $request, Project $project): RedirectResponse
    {
        // NOTE: Created Observer will be called here

        // info($request->paid_leave);

        $project->reports()
            ->create([
                'user_id'    => auth()->id(),
                'report'     => $request->input('report'),
                'date'       => $request->input('date'),
                'hours'      => $request->input('hours'),
                'paid_leave' => $request->input('paid_leave') ?? false,
            ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @param  DailyReport  $report
     * @return View
     */
    public function edit(Project $project, DailyReport $report): View
    {
        return view('report-edit', compact('report', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @param  DailyReport  $report
     * @return RedirectResponse
     */
    public function update(Request $request, Project $project, DailyReport $report): RedirectResponse
    {

        $validated = $request->validate([
            'report' => ['required', 'max:255'],
            'hour'   => 'required |in:1,2,3,4,5',
            'date'   => 'required |in:1,2,3',
        ]);

        $report->update([
            'report' => $request->report,
            'date'   => $request->date,
            'hour'   => $request->hour,
        ]);

        return redirect('dashboard');
    }
}
