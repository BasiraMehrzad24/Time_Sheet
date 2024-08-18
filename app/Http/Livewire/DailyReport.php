<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DailyReport extends Component
{

    public $report;
    public $comment;
    public $showComments = false;

    public function render()
    {
        return view('livewire.daily-report');
    }

    public function mount()
    {
        $this->comments = $this->report
            ->comments()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function reject()
    {
        // Updated Observer will be called here

        $this->report->status = 3;
        $this->report->save();
    }

    public function approve()
    {
        // Updated Observer will be called here

        $this->report->status = 2;
        $this->report->save();
    }

    public function toggleComments()
    {
        $this->showComments = ! $this->showComments;
    }

    public function store()
    {
        $this->validate([
            'comment' => 'required',
        ]);

        $this->report->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);

        $this->comments = $this->report
            ->comments()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $this->comment = '';
    }
}
