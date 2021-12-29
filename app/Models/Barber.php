<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barber extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function capsters(): HasMany
    {
        return $this->hasMany(Capster::class);
    }
}
