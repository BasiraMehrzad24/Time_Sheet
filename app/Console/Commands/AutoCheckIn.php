<?php

namespace App\Console\Commands;

use App\Notifications\AutoCheckInNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class AutoCheckIn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-check-in:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies users to check in';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        \App\Models\AutoCheckIn::with('project.users')
            ->whereTime('hour', now()->format('H:i'))
            ->where('days', 'like', '%'.now()->format('D').'%')
            ->chunkMap(function ($autoCheckIn) {
                Notification::send($autoCheckIn->project->users, new AutoCheckInNotification($autoCheckIn));
            });

        return Command::SUCCESS;
    }
}
