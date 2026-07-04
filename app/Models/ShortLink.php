<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string $original_url
 * @property string $short_code
 * @property int $clicks_count
 */
class ShortLink extends Model
{
    protected $fillable = [
        'user_id',
        'original_url',
        'short_code',
        'clicks_count',
    ];

    protected $casts = [
        'clicks_count' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function visits(): HasMany
    {
        return $this->hasMany(LinkVisit::class);
    }

    public function getShortUrlAttribute(): string
    {
        return url($this->short_code);
    }
}
