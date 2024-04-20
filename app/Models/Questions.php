<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    use HasFactory;

    public function choices(): HasMany
    {
        return $this->hasMany(Choices::class);
    }

    public function activities(): BelongsTo
    {
        return $this->belongsTo(Activities::class);
    }
}
