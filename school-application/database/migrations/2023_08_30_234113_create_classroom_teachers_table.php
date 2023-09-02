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
        Schema::create('classroom_teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('classroomId'); // foreign key
            $table->unsignedBigInteger('teacherId'); // foreign key

            //composite primary key
            $table->primary(['classroomId', 'teacherId']);

            //relationship
            $table->foreign('classroomId')
            ->references('id')
            ->on('class_rooms')
            ->onDelete('cascade'); // if classRoom deleted, delete all its classroom_teachers

            $table->foreign('teacherId')
            ->references('id')
            ->on('teachers')
            ->onDelete('cascade'); // if teacher deleted, delete all its classroom_teachers
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_teachers');
    }
};
