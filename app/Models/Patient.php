<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'nik',
        'birth_date',
        'gender',
        'address',
        'phone_number',
        'study',
        'blood_type',
        'profession',
        'allergy',
        'no_rekam_medis',
    ];
}
