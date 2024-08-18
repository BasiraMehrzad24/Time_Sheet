<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable =
    [
        'user_id',
        'daily_report_id',
        'comment',
    ];

    public function DailyReport()
    {
        return $this->belongsTo(DailyReport::class, 'daily_report_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Replay::class, 'comment_id', 'id');
    }
}
