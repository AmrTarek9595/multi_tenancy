<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['is_correct','answer','question_id'];
    protected $table='Answers';

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }
}
