<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\WorkoutResource\Pages;
use App\Models\Workout;
use App\Services\PexelsService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Facades\Storage;

class WorkoutResource extends Resource
{
    protected static ?string $model = Workout::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('muscle_group_id')
                    ->label('Bagian Otot')
                    ->relationship('muscleGroup', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('title')
                    ->label('Judul Workout')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('type')
                    ->label('Tipe Workout')
                    ->options([
                        'home' => 'Home Workout',
                        'gym' => 'Gym Workout',
                    ])
                    ->required(),

                Select::make('equipments')
                    ->label('Alat Workout')
                    ->relationship('equipments', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),

                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->columnSpanFull(),

                RichEditor::make('guide')
                    ->label('Panduan Gerakan (Step-by-Step)')
                    ->columnSpanFull(),

                RichEditor::make('common_mistakes')
                    ->label('Kesalahan Umum')
                    ->columnSpanFull(),

                TextInput::make('video_url')
                    ->label('URL Video YouTube')
                    ->regex('/^(https?:\/\/)?(www\.)?(youtube\.com\/|youtu\.be\/)/')
                    ->validationMessages(['regex' => 'URL Video YouTube tidak valid'])
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar Workout')
                    ->image()
                    ->directory('workouts')
                    ->columnSpanFull(),

                \Filament\Forms\Components\Actions::make([
                    \Filament\Forms\Components\Actions\Action::make('searchPexelsImage')
                        ->label('Cari Gambar dari Pexels')
                        ->icon('heroicon-o-photo')
                        ->color('gray')
                        ->form([
                            TextInput::make('pexels_query')
                                ->label('Kata Kunci')
                                ->default(fn ($get) => $get('title'))
                                ->placeholder('contoh: bench press gym workout')
                                ->required(),
                        ])
                        ->action(function ($data, $set) {
                            if (empty(config('pexels.api_key'))) {
                                Notification::make()
                                    ->title('Pexels API Key belum dikonfigurasi')
                                    ->body('Tambahkan PEXELS_API_KEY di file .env lalu restart container.')
                                    ->danger()
                                    ->send();
                                return;
                            }

                            $results = PexelsService::search($data['pexels_query'], 9);

                            if (empty($results)) {
                                Notification::make()
                                    ->title('Tidak ada hasil')
                                    ->body('Coba kata kunci lain yang lebih umum dalam Bahasa Inggris.')
                                    ->warning()
                                    ->send();
                                return;
                            }

                            $selected = $results[0];

                            try {
                                $imageContent = file_get_contents($selected['full']);
                                $filename = 'workouts/pexels-' . $selected['id'] . '.jpg';
                                Storage::disk('public')->put($filename, $imageContent);

                                $set('image', [$filename]);

                                Notification::make()
                                    ->title('Gambar berhasil diunduh!')
                                    ->body('Foto oleh ' . $selected['photographer'] . ' di Pexels — ' . count($results) . ' hasil ditemukan.')
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal mengunduh gambar')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        })
                        ->modalWidth('lg')
                        ->modalHeading('Cari Gambar Workout dari Pexels')
                        ->modalDescription('Ketik kata kunci dalam bahasa Inggris untuk hasil terbaik. Gambar pertama akan dipilih secara otomatis. Didukung oleh Pexels API.'),
                ])->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar'),

                TextColumn::make('title')
                    ->label('Workout')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('muscleGroup.name')
                    ->label('Bagian Otot')
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge(),

                IconColumn::make('is_published')
                    ->label('Publish')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkouts::route('/'),
            'create' => Pages\CreateWorkout::route('/create'),
            'edit' => Pages\EditWorkout::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'description'];
    }

    public static function getGlobalSearchResultDetails(\Illuminate\Database\Eloquent\Model $record): array
    {
        return [
            'Bagian Otot' => $record->muscleGroup?->name,
            'Tipe' => $record->type,
        ];
    }
}
