<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    protected $table = 'project_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Project::where('id',$id)->update(['num_allowed_days' =>$request->input('num_allowed_days')]);
}
