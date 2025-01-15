<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=['nameOfQuiz','ScoreOfQuiz'];
    
    protected $table='quizs';

    public function Question()
    {
        return $this->hasMany(Question::class);
    }
    public function users() 
    { 
        return $this->belongsToMany(User::class)->withPivot('score')->withTimestamps(); 
    }
    protected $casts = [ 'created_at' => 'date:Y-m-d', ];
}
