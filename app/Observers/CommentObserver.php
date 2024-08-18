<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\User;
use App\Notifications\DailyReportCommented;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $user = User::first();
        $user->notify(new DailyReportCommented($comment));
    }

    /**
     * Handle the Comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
}
