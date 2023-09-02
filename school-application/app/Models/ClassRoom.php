<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'buildingId',
        'name',
    ];

    // Building one_to_many relationship
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // Student many-to-many relationship
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    // Teacher many-to-many relationship
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
