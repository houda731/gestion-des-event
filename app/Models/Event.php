<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'place', 'image', 'created_by'
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
