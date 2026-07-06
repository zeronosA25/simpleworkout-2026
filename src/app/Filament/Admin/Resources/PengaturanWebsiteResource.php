<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PengaturanWebsiteResource\Pages;
use App\Models\PengaturanWebsite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengaturanWebsiteResource extends Resource
{
    protected static ?string $model = PengaturanWebsite::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $label = 'Pengaturan Website';

    protected static ?string $pluralLabel = 'Pengaturan Website';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('nama_website')
                            ->label('Nama Website')
                            ->required(),
                        Forms\Components\Textarea::make('deskripsi_singkat_website')
                            ->label('Deskripsi Singkat Website')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Judul Hero (Halaman Utama)'),
                        Forms\Components\TextInput::make('hero_subtitle')
                            ->label('Subjudul Hero'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Logo & Favicon')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Website')
                            ->image()
                            ->directory('website'),
                        Forms\Components\FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('website'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kontak Admin')
                    ->schema([
                        Forms\Components\TextInput::make('email_admin')
                            ->label('Email Admin')
                            ->email(),
                        Forms\Components\TextInput::make('nomor_whatsapp_admin')
                            ->label('Nomor WhatsApp Admin'),
                        Forms\Components\Textarea::make('alamat_fisik')
                            ->label('Alamat Fisik')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('jam_operasional')
                            ->label('Jam Operasional')
                            ->placeholder('Contoh: Senin–Jumat, 08.00–17.00'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_website')
                    ->label('Nama Website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_admin')
                    ->label('Email Admin'),
                Tables\Columns\TextColumn::make('nomor_whatsapp_admin')
                    ->label('WhatsApp'),
                Tables\Columns\TextColumn::make('jam_operasional')
                    ->label('Jam Operasional'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaturanWebsite::route('/'),
            'edit' => Pages\EditPengaturanWebsite::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
