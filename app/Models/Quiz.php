<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=['nameOfQuiz'];
    
    protected $table='quizs';

    public function Question()
    {
        return $this->hasMany(Question::class);
    }
    protected $casts = [ 'created_at' => 'date:Y-m-d', ];
}
