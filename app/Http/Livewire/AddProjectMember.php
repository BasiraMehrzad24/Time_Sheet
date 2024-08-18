<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class AddProjectMember extends ModalComponent
{

    public $project;
    public $users;
    public $role;
    public $user_id;

    public function mount()
    {
        $this->project = Project::findOrFail($this->project['id']);

        // $this->users = Project::query()
        //     ->find($this->project->id)   
        //     ->whereNotIn('users.id', [Auth::id(), ...$this->project->users->pluck('id')])
        //     ->get();
    }

    public function render()
    {
        return view('livewire.add-project-member');
    }

    public function store()
    {
        $this->project->users()->attach($this->user_id, ['role' => $this->role]);

        $this->closeModal();

        return $this->redirect(route('projects.setting', $this->project));
    }
}
