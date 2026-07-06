<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TemplateJadwalResource\Pages;
use App\Models\TemplateJadwal;
use App\Models\Workout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TemplateJadwalResource extends Resource
{
    protected static ?string $model = TemplateJadwal::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Template Jadwal';

    protected static ?string $pluralLabel = 'Template Jadwal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_template')
                    ->label('Nama Template')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('jumlah_hari_per_minggu')
                    ->label('Jumlah Hari per Minggu')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(7)
                    ->default(7),

                Forms\Components\Repeater::make('hariJadwal')
                    ->label('Daftar Hari')
                    ->relationship('hariJadwal')
                    ->orderColumn('urutan_hari')
                    ->schema([
                        Forms\Components\TextInput::make('nama_hari')
                            ->label('Nama Hari')
                            ->required(),
                        Forms\Components\TextInput::make('urutan_hari')
                            ->label('Urutan Hari')
                            ->numeric()
                            ->required(),
                        Forms\Components\Repeater::make('detailJadwal')
                            ->label('Gerakan di Hari Ini')
                            ->relationship('detailJadwal')
                            ->orderColumn('urutan_gerakan')
                            ->schema([
                                Forms\Components\Select::make('gerakan_id')
                                    ->label('Gerakan')
                                    ->options(Workout::where('is_published', true)->pluck('title', 'id'))
                                    ->searchable()
                                    ->required(),
                                Forms\Components\TextInput::make('urutan_gerakan')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Tambah Gerakan'),
                    ])
                    ->columns(2)
                    ->addActionLabel('Tambah Hari')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_template')
                    ->label('Nama Template')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_hari_per_minggu')
                    ->label('Hari/Minggu'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplateJadwal::route('/'),
            'create' => Pages\CreateTemplateJadwal::route('/create'),
            'edit' => Pages\EditTemplateJadwal::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
