<?php

namespace App\Models;

class Group extends Model
{
    protected $fillable = ['name', 'description', 'question'];

    public function recruits()
    {
        return $this->hasMany(Recruit::class);
    }
}
