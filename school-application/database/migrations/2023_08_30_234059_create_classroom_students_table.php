<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classroom_students', function (Blueprint $table) {
            $table->unsignedBigInteger('classroomId'); // foreign key
            $table->unsignedBigInteger('studentId'); // foreign key

            //composite primary key
            $table->primary(['classroomId', 'studentId']);

            //relationship
            $table->foreign('classroomId')
            ->references('id')
            ->on('class_rooms')
            ->onDelete('cascade'); // if classRoom deleted, delete all its classroom_students

            $table->foreign('studentId')
            ->references('id')
            ->on('students')
            ->onDelete('cascade'); // if student deleted, delete all its classroom_students
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_students');
    }
};
