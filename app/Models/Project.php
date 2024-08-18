<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function reports()
    {
        return $this->hasMany(DailyReport::class);
    }

    public function projectUser()
    {
        return $this->hasMany(ProjectUser::class, 'project_id', 'id');
    }

    public function autoCheckIn()
    {
        return $this->hasOne(AutoCheckIn::class);
    }

}
