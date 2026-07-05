<?php

namespace App\Filament\Resources\ShortLinks\Pages;

use App\Filament\Resources\ShortLinks\ShortLinkResource;
use Filament\Resources\Pages\ViewRecord;

class ViewShortLink extends ViewRecord
{
    protected static string $resource = ShortLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
