<?php

namespace App\Filament\Resources\Cooperations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class CooperationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Logo Kerja Sama')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth(800)
                    ->imageResizeTargetHeight(800)
                    ->directory('cooperations')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->helperText('Upload logo mitra. Format JPG/PNG, maksimal 2MB.')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
