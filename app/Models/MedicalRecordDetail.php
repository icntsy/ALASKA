<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordDetail extends Model
{
    use HasFactory;

    protected $table = "medical_record_detail";

    protected $fillable = [
        'queue_id',
        'status',
    ];

    public function queue(){
        return $this->belongsTo(Queue::class);
    }
}
