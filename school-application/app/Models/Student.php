<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'majot',
    ];

    //User one-to-one relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //ClassRoom many-to-many relationship
    public function classRooms()
    {
        return $this->belongsToMany(ClassRoom::class);
    }
}
