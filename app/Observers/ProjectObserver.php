<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        $project->autoCheckIn()
            ->create([
                'hour' => '16:00:00',
                'days' => ['Sat', 'Sun', 'Mon', 'Thu', 'Wed', 'Tue'],
                'user_id' => $project->user_id,
            ]);
    }
}
