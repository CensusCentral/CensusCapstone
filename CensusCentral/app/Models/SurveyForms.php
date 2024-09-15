<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Isfhead; 


class SurveyForms extends Model
{
    use HasFactory;

    protected $table = 'survey_forms'; 

    protected $fillable=[
        
        'surveyDate',
        'barangay',
        'sitioPurok',
        'interviewerName',
        'areaClassification'
    

    ];

    public function isfhead()
    {
        return $this->hasOne(Isfhead::class, 'surveyId', 'surveyId');
    }
}
