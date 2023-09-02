<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'name',
    ];

    // Building one_to_many relationship
    public function classRooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
