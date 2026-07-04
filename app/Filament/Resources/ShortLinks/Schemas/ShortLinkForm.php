<?php

namespace App\Filament\Resources\ShortLinks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShortLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('original_url')
                    ->label('Original URL')
                    ->url()
                    ->required()
                    ->maxLength(2048),
            ]);
    }
}
