<?php

namespace App\Filament\Resources\ShortLinks;

use App\Filament\Resources\ShortLinks\Pages\CreateShortLink;
use App\Filament\Resources\ShortLinks\Pages\EditShortLink;
use App\Filament\Resources\ShortLinks\Pages\ListShortLinks;
use App\Filament\Resources\ShortLinks\Schemas\ShortLinkForm;
use App\Filament\Resources\ShortLinks\Tables\ShortLinksTable;
use App\Models\ShortLink;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ShortLinks\RelationManagers\VisitsRelationManager;

class ShortLinkResource extends Resource
{
    protected static ?string $model = ShortLink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ShortLinkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ShortLinksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            VisitsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListShortLinks::route('/'),
            'create' => CreateShortLink::route('/create'),
            'edit' => EditShortLink::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }
}
