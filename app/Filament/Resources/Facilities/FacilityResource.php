<?php

namespace App\Filament\Resources\Facilities;

use App\Filament\Resources\Facilities\Pages\CreateFacility;
use App\Filament\Resources\Facilities\Pages\EditFacility;
use App\Filament\Resources\Facilities\Pages\ListFacilities;
use App\Filament\Resources\Facilities\Tables\FacilitiesTable;
use App\Models\Facility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use UnitEnum;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $recordTitleAttribute = 'content';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Fasilitas';
    protected static ?string $modelLabel = 'Fasilitas';
    protected static ?string $pluralModelLabel = 'Fasilitas';

    // ✅ FIX DI SINI
    protected static UnitEnum|string|null $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('content')
                    ->label('Deskripsi Fasilitas')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Foto Fasilitas')
                    ->image()
                    ->directory('facilities')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return FacilitiesTable::make($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFacilities::route('/'),
            'create' => CreateFacility::route('/create'),
            'edit' => EditFacility::route('/{record}/edit'),
        ];
    }
}