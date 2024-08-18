<?php

namespace App\Observers;

use App\Models\DailyReport;
use App\Notifications\DailyReportApproved;
use App\Notifications\DailyReportCreated;
use App\Notifications\DailyReportRejected;

class DailyReportObserver
{
    /**
     * Handle the DailyReport "created" event.
     *
     * @param  DailyReport  $dailyReport
     * @return void
     */
    public function created(DailyReport $dailyReport)
    {
        $admins = $dailyReport->project->users()
            ->wherePivot('role', 'admin')
            ->get();

        foreach ($admins as $admin) {
            $admin->notify(new DailyReportCreated($dailyReport));
        }
    }

    /**
     * Handle the DailyReport "updated" event.
     *
     * @param  DailyReport  $dailyReport
     * @return void
     */
    public function updated(DailyReport $dailyReport)
    {
        switch ($dailyReport->status) {
            case 2:
                $dailyReport->user->notify(new DailyReportApproved($dailyReport));
                break;
            case 3:
                $dailyReport->user->notify(new DailyReportRejected($dailyReport));
        }
    }
}
