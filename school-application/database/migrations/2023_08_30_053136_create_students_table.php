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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId')->uniqid(); // foreign key
            $table->string('firstName' , 255);
            $table->string('lastName' , 255)->nullable(false);
            $table->string('majot' , 255)->nullable(false);
            $table->timestamps(); // created_at, updated_at

            //relationship
            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); // if user deleted, delete all his students
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
