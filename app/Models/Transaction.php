<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_id',
        'payment',

    ];

    public function queue(){
        return $this->belongsTo(Queue::class);
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function jenis(){
        return $this->belongsTo(Queue::class, 'jenis_rawat');
    }

    public function drug(){
        return $this->belongsToMany(Drug::class, 'medical_record_drugs')->withPivot('instruction');
    }

}
