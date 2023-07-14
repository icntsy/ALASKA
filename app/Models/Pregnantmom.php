<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnantmom extends Model
{
    use HasFactory;

    protected $fillable = [
        'gravida_id',
        'anak_ke',
        'hpht',
        'hpll',
        'hpl',
        'pregnant_age',
        'lila',
        'weight',
        'blood_pressure',
        'tfu',
        'djj',
        'immunization_tt',
        'complaint',
    ];
}
