<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'image', 'url', 'skill_id'];

    public function skills()
    {
        return $this->belongsTo(Skill::class);
    }
}
