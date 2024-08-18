<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\MonthlyInvoice;
use Illuminate\Console\Command;
use Carbon\Carbon;

class MonthlySummary extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly-summary:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send monthly summary for user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the user how has reports in the expected month
        $users = User::WhereHas('reports', function ($query) {
            $date = Carbon::now()->subMonth();

            return $query->whereMonth('date', $date->month)->whereYear('date', $date->year);
        })->get();
        
        foreach($users as $user){
            $user->notify(new MonthlyInvoice($user));
        }

        // ->chunkMap(function (User $user) {
        //     $user->notify(new MonthlyInvoice($user));
        // });

        return Command::SUCCESS;
    }
}
