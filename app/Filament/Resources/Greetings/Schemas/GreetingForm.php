<?php

namespace App\Filament\Resources\Greetings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class GreetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('content')
                    ->label('Isi Sambutan')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'link',
                        'h2',
                        'h3',
                        'blockquote',
                        'attachFiles',
                        'redo',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('greetings/content')
                    ->fileAttachmentsVisibility('public')
                    ->required()
                    ->helperText('Tulis isi sambutan; gunakan ikon lampiran untuk menyisipkan gambar di teks.')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Foto Pimpinan')
                    ->image()
                    ->directory('greetings')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Upload foto pimpinan. Format JPG/PNG, maksimal 2MB.')
                    ->columnSpanFull(),
            ]);
    }
}
