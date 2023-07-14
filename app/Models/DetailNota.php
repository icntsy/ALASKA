<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailNota extends Model
{
    use HasFactory;

    protected $table = "detail_nota";

    protected $guarded = [''];

    public function queue(){
        return $this->belongsTo(Queue::class);
    }


}
