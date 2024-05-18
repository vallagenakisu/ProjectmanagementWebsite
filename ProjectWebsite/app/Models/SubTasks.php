<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class SubTasks extends Model
{
    use HasFactory;
    public function card()
    {
        return $this->belongsTo(Cards::class);
    }
    use HasRecursiveRelationships;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function subTasks()
    {
        return $this->hasMany(SubTasks::class);
    }
}
