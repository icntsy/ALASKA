<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyPlanningExamination extends Model
{
    use HasFactory;
    protected $table = "family_planning_examination";

    protected $fillable = [

        'arrival_date',
        'body_weight',
        'blood_pressure',
        'return_date',
    ];

    public function familyplanning()
    {
        return $this->belongsTo(Familyplanning::class, 'familyplanning_id');
    }
}

