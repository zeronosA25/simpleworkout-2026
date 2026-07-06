<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SaranKritikResource\Pages;
use App\Models\Faq;
use App\Models\SaranKritik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SaranKritikResource extends Resource
{
    protected static ?string $model = SaranKritik::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Moderasi';

    protected static ?string $label = 'Saran / Kritik';

    protected static ?string $pluralLabel = 'Saran / Kritik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Saran')
                    ->schema([
                        Forms\Components\TextInput::make('user.name')
                            ->label('Pengirim')
                            ->disabled(),
                        Forms\Components\TextInput::make('kategori')
                            ->label('Kategori')
                            ->disabled(),
                        Forms\Components\Textarea::make('pesan')
                            ->label('Pesan')
                            ->disabled()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('created_at')
                            ->label('Dikirim Pada')
                            ->disabled(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tindak Lanjut')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'Pending' => 'Pending',
                                'On-Progress' => 'On-Progress',
                                'Resolved' => 'Resolved',
                            ])
                            ->required(),
                        Forms\Components\RichEditor::make('balasan_admin')
                            ->label('Balasan Admin')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pengirim')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(60)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'On-Progress' => 'info',
                        'Resolved' => 'success',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('publishToFaq')
                    ->label('Publikasi ke FAQ')
                    ->icon('heroicon-o-question-mark-circle')
                    ->color('success')
                    ->visible(fn (SaranKritik $record) => $record->status === 'Resolved' && !empty($record->balasan_admin))
                    ->action(function (SaranKritik $record) {
                        Faq::create([
                            'pertanyaan' => $record->pesan,
                            'jawaban' => $record->balasan_admin,
                            'is_published' => true,
                            'created_from_saran_id' => $record->id,
                        ]);
                        Notification::make()
                            ->title('Berhasil dipublikasikan ke FAQ')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListSaranKritik::route('/'),
            'edit' => Pages\EditSaranKritik::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
