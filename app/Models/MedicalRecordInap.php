<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordInap extends Model
{
    use HasFactory;
    protected $table = "medical_record_inap";

    protected $guarded = [''];

    public function drugs(){
        return $this->belongsToMany("App\Models\Drug", "medical_record_id", "medical_record_id")->withPivot(['quantity', 'instruction']);
    }
    public function labs(){
        return $this->belongsToMany("App\Models\Lab", "medical_record_id", "medical_record_id")->withPivot('result');
    }
    public function diagnoses(){
        return $this->belongsToMany("App\Models\Diagnosis", "medical_record_id", "id");
    }
}
