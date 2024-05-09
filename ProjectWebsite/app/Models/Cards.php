<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'adminName', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
