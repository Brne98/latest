<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    //Relationships

    //Has
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class);
    }

    //Belongs
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

}
