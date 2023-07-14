<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordLab extends Model
{
    use HasFactory;

    protected $table = "medical_record_labs";

    protected $guarded = [''];
}
