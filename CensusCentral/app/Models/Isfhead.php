<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyForms; 
use App\Models\Isfmember; 

class Isfhead extends Model
{
    use HasFactory;

    protected $fillable = [

        'surveyId',
        'lastName',
        'firstName',
        'middleName',
        'maidenName',
        'dateOfBirth',
        'age',
        'sex',
        'civilStatus',
        'occupation',
        'workplace',
        'address',
        
        'pwd',
        'senior',
        'lgbtq',
        '4ps',
        'Pagibig',

        'gender',
        'disability',

        'spouseLname',
        'spouseFname',
        'spouseMname',
        'spouseMaidenName',
        'spouseDOB',
        'spouseAge',
        'spouseSex',
        'spouseCommunityGroup',
        'spouseGender',
        
        'MedicalHistory',
        'HouseholdClass',
        
        'householdSize',
        'yearResidency',
        'doubleHousehold',
        'indigenousOrNot',
        'placeOrigin',
        'reasonEstablishing',
        'tenurialStatus',
        'governmentResettelment',
        'whichProgram'
    ];


    public function surveyForm()
    {
        return $this->belongsTo(SurveyForms::class, 'surveyId', 'surveyId');
    }

    public function members()
{
    return $this->hasMany(Isfmember::class, 'headId', 'id');
}


    
}
