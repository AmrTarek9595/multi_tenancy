<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['question','quiz_id'];
    protected $table='questions';


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function quizs()
    {
        return $this->belongsTo(Quiz::class);
    }
    protected $casts = [ 'created_at' => 'date:Y-m-d', ];


}
