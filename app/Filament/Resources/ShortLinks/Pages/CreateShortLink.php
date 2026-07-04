<?php

namespace App\Filament\Resources\ShortLinks\Pages;

use App\Filament\Resources\ShortLinks\ShortLinkResource;
use App\Models\ShortLink;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateShortLink extends CreateRecord
{
    protected static string $resource = ShortLinkResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        do {
            $shortCode = Str::random(6);
        } while (ShortLink::where('short_code', $shortCode)->exists());

        $data['user_id'] = auth()->id();
        $data['short_code'] = $shortCode;
        $data['clicks_count'] = 0;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
