<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return bool
     */
    public function isAdmin(User $user, Project $project)
    {
        return $project->users()
            ->wherePivot('role', 'admin')
            ->where('users.id', Auth::id())
            ->exists();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return bool
     */
    public function isMember(User $user, Project $project)
    {
        return ! $this->isAdmin($user, $project);
    }

    public function view(User $user, Project $project)
    {
        return $project->users()
            ->where('users.id', Auth::id())
            ->exists();
    }
}
