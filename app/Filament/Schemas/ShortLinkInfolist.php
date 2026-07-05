<?php

namespace App\Filament\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ShortLinkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('original_url')
                    ->label('Original URL'),

                TextEntry::make('short_url')
                    ->label('Short URL')
                    ->copyable(),

                TextEntry::make('short_code')
                    ->label('Short Code'),

                TextEntry::make('clicks_count')
                    ->label('Clicks'),

                TextEntry::make('created_at')
                    ->label('Created')
                    ->dateTime('d.m.Y H:i:s'),
            ]);
    }
}
