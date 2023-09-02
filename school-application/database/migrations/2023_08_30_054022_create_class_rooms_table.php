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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buildingId'); // foreign key
            $table->string('name' , 255);
            $table->timestamps();

            //relationship
            $table->foreign('buildingId')
            ->references('id')
            ->on('buildings')
            ->onDelete('restrict'); // if building deleted, delete all its classRomms
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_rooms');
    }
};
