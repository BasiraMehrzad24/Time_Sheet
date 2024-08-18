<?php

namespace App\Http\Livewire;

use App\Models\Project;
use LivewireUI\Modal\ModalComponent;

class ChangeProjectMemberRole extends ModalComponent
{

    public $project;

    public $user;

    public $role;

    protected $rules = [
        'role' => ['required', 'string', 'min:3'],
    ];

    public function mount()
    {
        $this->project = Project::findOrfail($this->project);

        $this->user = $this->project->users()->findOrfail($this->user);

        $this->role = $this->user->pivot->role;
    }

    public function render()
    {
        return view('livewire.change-project-member-role');
    }

    public function store()
    {
        $this->validate();

        $this->project->users()->updateExistingPivot($this->user, ['role' => $this->role]);

        return redirect()->route('projects.setting', $this->project->id);
    }

    public function delete()
    {
        $this->project->users()->detach($this->user);

        return redirect()->route('projects.setting', $this->project->id);
    }
}
