<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugBidan extends Model
{
    use HasFactory;

    protected $table = "drug_bidan";

    protected $guarded = [''];

    public function drug()
    {
        return $this->belongsTo(Drug::class, "drug_id");
    }

}
