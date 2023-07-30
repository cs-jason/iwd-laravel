<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'progress_percentage', 'score_percentage'];
    protected $table = 'progress';

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
