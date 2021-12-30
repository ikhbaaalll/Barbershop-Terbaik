<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'barber_id',
        'name'
    ];

    public function barber(): BelongsTo
    {
        return $this->belongsTo(Barber::class);
    }
}
