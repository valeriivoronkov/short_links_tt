<?php

namespace App\Filament\Resources\ShortLinks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;

class ShortLinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->poll('6s')
            ->columns([
                TextColumn::make('original_url')
                    ->label('Original URL')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('short_url')
                    ->label('Short URL')
                    ->copyable()
                    ->url(fn ($record) => $record->short_url)
                    ->openUrlInNewTab(),

                TextColumn::make('clicks_count')
                    ->label('Clicks')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
