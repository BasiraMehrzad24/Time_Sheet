<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'compani_id',
        'project_id',
        'start_day',
        'end_day',
    ];

}
