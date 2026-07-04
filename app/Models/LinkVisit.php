<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $short_link_id
 * @property string $ip_address
 */
class LinkVisit extends Model
{
    protected $fillable = [
        'short_link_id',
        'ip_address',
    ];

    public function shortLink(): BelongsTo
    {
        return $this->belongsTo(ShortLink::class);
    }
}
