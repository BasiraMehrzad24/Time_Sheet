<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Return the welcome page
     *
     * @return View
     */
    public function dashboard(): View
    {
        $projects = Auth::user()
            ->projects()
            ->when(request('search'), fn ($query) => $query->where('title', 'like', '%' . request('search') . '%'))
            ->latest()
            ->get();

        return view('dashboard', compact('projects'));
    }

 
}
