<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DefaultMessage extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(DefaultMessage::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(DefaultMessage::class, 'parent_id');
    }
}
