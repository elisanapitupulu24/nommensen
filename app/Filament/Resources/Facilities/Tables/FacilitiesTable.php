<?php

namespace App\Filament\Resources\Facilities\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class FacilitiesTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')
                    ->label('Deskripsi')
                    ->limit(50),

                ImageColumn::make('image')
                    ->label('Foto'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}