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
        Schema::create('household_conditions', function (Blueprint $table) {
            $table->id('houseId'); 
             // Primary key for this table
            $table->unsignedBigInteger('ownerId');  // Foreign key column
            $table->foreign('ownerId')->references('id')->on('isfheads')->onDelete('cascade');  // Ensure the foreign key is correct
            
            $table->integer('houseAge');
            $table->string('typeOfStructure');
            $table->string('useOfStructure');
            $table->integer('NoOfFloors');
            $table->string('typeOfHouse');
            $table->decimal('EstimatedFloorArea');
            $table->string('toiletType');
            $table->string('waterSource');
            $table->string('garbageDisposal');
            $table->string('electricitySource');  // Fixed typo
            $table->string('modeOfHouse');
            $table->string('relationToOwner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('household_conditions');  // Correct table name
    }
};
