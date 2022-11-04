<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relationships

    //Has

    //Belongs
    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
