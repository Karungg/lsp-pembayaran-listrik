<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanResource\Pages;
use App\Filament\Resources\TagihanResource\RelationManagers;
use App\Models\Tagihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagihanResource extends Resource
{
    protected static ?string $model = Tagihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tbpelanggan_id')
                    ->relationship('pelanggan', 'nama_pelanggan')
                    ->required(),
                Forms\Components\TextInput::make('tahun_tagihan')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('bulan_tagihan')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pemakaian')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tbpelanggan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_tagihan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bulan_tagihan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pemakaian')
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
            'index' => Pages\ListTagihans::route('/'),
            'create' => Pages\CreateTagihan::route('/create'),
            'view' => Pages\ViewTagihan::route('/{record}'),
            'edit' => Pages\EditTagihan::route('/{record}/edit'),
        ];
    }
}
