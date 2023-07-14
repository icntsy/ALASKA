<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gravida extends Model
{
    use HasFactory;

    protected $table = "gravida";
    protected $fillable = [
        'patien_id',
        'bidan_id',
        'hpl',
    ];

    public function patient()
    {
        return $this->belongsTo("App\Models\Patient", "patien_id", "id");
    }
    public function pregnantmoms()
    {
        return $this->belongsToMany("App\Models\Pregnantmoms", "gravida_id", "id");
    }
}
