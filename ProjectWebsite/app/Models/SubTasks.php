<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class SubTasks extends Model
{
    use HasFactory;
    public function cards()
    {
        return $this->belongsTo(Cards::class);   
    }
    // public function parent()
    // {
    //     return $this->hasMany(SubTasks::class , 'parent_id');
    // }
    use HasRecursiveRelationships;
}
