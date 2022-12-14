<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded=[];
    //Relationships

    //Has
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    //Belongs
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
