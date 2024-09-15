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
        Schema::create('isfheads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyId');
            $table->foreign('surveyId')->references('surveyId')->on('survey_forms')->onDelete('cascade');
            //NAME NG HEAD
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            // if female ang head
            $table->string('maidenName')->nullable();

            $table->date('dateOfBirth');
            $table->integer('age');
            $table->string('sex');
            $table->string('civilStatus');

            //WORK IF MERON
            $table->string('occupation');
            $table->string('workplace')->nullable();
          
            
            $table->string('address');

            $table->boolean('pwd')->default(false);
            $table->boolean('senior')->default(false);
            $table->boolean('lgbtq')->default(false);
            $table->boolean('4ps')->default(false);
            $table->boolean('Pagibig')->default(false);

            //if pwd 
            $table->string('gender')->nullable();
            //if lgbtq
            $table->string('disability')->nullable();

           
           
        
            //IF MAY PARTNER

            $table->string('spouseLname')->nullable();
            $table->string('spouseFname')->nullable();
            $table->string('spouseMname')->nullable();
            $table->string('spouseMaidenName')->nullable();
            $table->date('spouseDOB')->nullable();

            //naka disabled to enable depende sa choice
            $table->integer('spouseAge')->nullable();
            $table->string('spouseSex')->nullable();
            

           //IF MERON 
            $table->string('MedicalHistory')->nullable();

           


            $table->string('HouseholdClass');
            $table->integer('yearResidency');
            $table->integer('householdSize');
           
            $table->string('doubleHousehold');

            $table->string('indigenousOrNot');
            
            $table->string('placeOrigin');

            $table->text('reasonEstablishing');
            $table->string('tenurialStatus');
            
            $table->string('governmentResettelment');
            $table->text('whichProgram')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isfheads');
    }
};
