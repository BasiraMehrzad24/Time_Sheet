<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class CreateProject extends ModalComponent
{
    public $title;

    public $description;



    protected $rules = [
    
        'title' => ['required', 'string', 'min:3'],
        'description' => ['required', 'string', 'min:3'],
    ];

    public function render()
    {
        return view('livewire.create-project');
    }

    public function store()
    {
        $this->validate();

        $project = Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        // Add the auth user to the project
        $project->users()->attach(Auth::id(), ['role' => 'admin']);

        return redirect()->route('projects.show', $project->id);
    }
}
