<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Patient;

class Owner extends Model
{
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
