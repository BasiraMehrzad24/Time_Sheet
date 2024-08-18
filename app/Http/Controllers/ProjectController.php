<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return View
     * @throws AuthorizationException
     */
    public function __invoke(Project $project): View
    {
        $this->authorize('isAdmin', $project);

        $users = $project->users()->latest()->get();

        return view('project-setting', compact('project', 'users'));
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        $user = Auth::user();

        $status = [
            'pending'  => 1,
            'approved' => 2,
            'rejected' => 3,
        ];

        $reports = DailyReport::query()
            ->where('project_id', $project->id)
            ->when(request()->has('tab'), function ($query) use ($status) {
                return $query->where('status', $status[request()->tab]);
            })
            ->when($user->cannot('isAdmin', $project), function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('date', 'desc')
            ->simplePaginate();

        return view('project.detail', compact('project', 'reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Project $project)
    {
        $this->authorize('isAdmin', $project);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('isAdmin', $project);

        $request->validate([
            'title'       => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        $project->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.setting', $project->id)
            ->with('message-basic-setting', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     */
    public function destroy(Project $project)
    {
        $this->authorize('isAdmin', $project);

        $project->delete();

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param $project_id
     * @return RedirectResponse
     */
    public function deletUser($id, $project_id)
    {
        $user = ProjectUser::where('user_id', $id)->where('project_id', $project_id)->first();
        if ($user->delete()) {
            return back();
        } else {
            return back()->with('erorr', 'Somthing went wrong!');
        }
    }

    /**
     * Update allowed days for the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function updateAllowedDays(Request $request, Project $project): RedirectResponse
    {
        $this->authorize('isAdmin', $project);

        $request->validate([
            'days' => ['required', 'numeric', 'min:1', 'max:31'],
        ]);

        $project->update(['num_allowed_days' => $request->days]);

        return redirect()->back()->with('message-daily-report', 'Number of allowed days updated successfully');
    }
}
