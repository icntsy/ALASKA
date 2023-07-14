<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'anamnesis',
        'physical_test',
        'main_complaint',
        'doctor_id',
        'patient_id',
    ];

    public function drugs(){
        return $this->belongsToMany(Drug::class, 'medical_record_drugs')->withPivot(['quantity', 'instruction']);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function labs(){
        return $this->belongsToMany(Lab::class, 'medical_record_labs')->withPivot('result');
    }
    public function diagnoses(){
        return $this->belongsToMany(Diagnosis::class, 'medical_record_diagnoses')->withPivot('description');
        // return $this->belongsToMany(Diagnosis::class, 'medical_record_diagnoses');
    }
    public function medicalRecordDrugs()
    {
        return $this->hasOne(MedicalRecordDrugs::class, 'medical_record_id', 'id');
    }
    public function queue() {
        return $this->hasOne(Queue::class, 'medical_record_id', 'id');
    }
    public function inap()
    {
        return $this->belongsTo("App\Models\MedicalRecordInap", "id", "medical_record_id");
    }
}
