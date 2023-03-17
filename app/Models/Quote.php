<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'content'];


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
