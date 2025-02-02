<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TarifListrikResource\Pages;
use App\Filament\Resources\TarifListrikResource\RelationManagers;
use App\Models\TarifListrik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TarifListrikResource extends Resource
{
    protected static ?string $model = TarifListrik::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Master';

    protected static ?string $pluralModelLabel = 'Tarif Listrik';

    protected static ?string $modelLabel = 'Tarif Listrik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kdtarif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('beban')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tarif_perkwh')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tbuser_id')
                    ->relationship('pelanggan', 'nama_pelanggan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kdtarif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('beban')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarif_perkwh')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tbuser_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTarifListriks::route('/'),
            'create' => Pages\CreateTarifListrik::route('/create'),
            'view' => Pages\ViewTarifListrik::route('/{record}'),
            'edit' => Pages\EditTarifListrik::route('/{record}/edit'),
        ];
    }
}
