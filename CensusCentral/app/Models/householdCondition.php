<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class householdCondition extends Model
{
    use HasFactory;


    protected $fillable = [
        'ownerId',
        'houseAge',
        'typeOfStructure',
        'useOfStructure',
        'NoOfFloors',
        'typeOfHouse',
        'EstimatedFloorArea',
        'toiletType',
        'waterSource',
        'garbageDisposal',
        'electricitySource',
        'modeOfHouse',
        'relationToOwner',
        


    ];
}
