<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecordDrugs extends Model
{
    use HasFactory;

    protected $table = "medical_record_drugs";

    protected $guarded = [''];

    public function Drugs()
    {
        return $this->hasOne(Drug::class, 'id', 'drug_id');
    }

}
