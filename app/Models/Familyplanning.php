<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familyplanning extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'address',
        'husbands_name',
        'entry_date',
    ];

    public function familyPlanningExaminations()
    {
        return $this->hasMany(FamilyPlanningExamination::class, 'familyplanning_id');
    }
}

