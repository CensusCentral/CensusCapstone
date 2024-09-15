<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Isfhead; 

class isfmember extends Model
{

    protected $table = "isfmembers";

    protected $fillable = [
        'headId',
        'memberlastName',
        'memberfirstName',
        'memberMiddleName',
        'memberMaidenName',
        'memberSex',
        'memberDOB',
        'memberAge',
        'memberCivilStatus',
        'memberOccupation',
        'memberPlaceOfWork',
        'memberRelationToHead',
        'memberOfCommunityGroup',
        'memberAnyDisability',
        'memberGenderIdentification',
        'memberEducAttaintment',
        'memberEstimatedIncome'
    ];
    protected $casts = [
        'memberEstimatedIncome' => 'decimal:2',
    ];

    public function isfhead()
    {
        return $this->belongsTo(Isfhead::class, 'headId', 'id');
    }
}

