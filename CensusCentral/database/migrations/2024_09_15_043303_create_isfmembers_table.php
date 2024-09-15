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
        Schema::create('isfmembers', function (Blueprint $table) {
            
            $table->id('memberId');
            
             $table->unsignedBigInteger('headId');
             $table->foreign('headId')->references('id')->on('isfheads')->onDelete('cascade');
            $table->string('memberlastName');
            $table->string('memberfirstName');
            $table->string('memberMiddleName')->nullable();
            $table->string('memberMaidenName')->nullable();
            $table->string('memberSex');
            $table->date('memberDOB');
            $table->integer('memberAge');
            $table->string('memberCivilStatus');
            $table->string('memberOccupation')->nullable();
            $table->string('memberPlaceOfWork')->nullable();
            $table->string('memberRelationToHead');
            $table->string('memberOfCommunityGroup');
            $table->string('memberAnyDisability')->nullable();
            $table->string('memberGenderIdentification');
            $table->string('memberEducAttaintment');
            $table->decimal('memberEstimatedIncome')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isfmembers');
    }
};
