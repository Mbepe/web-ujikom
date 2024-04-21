<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\PoskoNaru;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PoskoNaruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PoskoNaruResource\RelationManagers;

class PoskoNaruResource extends Resource
{
    protected static ?string $model = PoskoNaru::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama')->required(),
                        TextInput::make('no_telpon')->required()->Unique(ignorable:fn($record)=>$record),
                        TextInput::make('masuk')->required(),
                        TextInput::make('selesai')->required(),
                        Select::make('petugas')->options([
                            'Dokter'=>'Dokter',
                            'Agent'=>'Agent',
                            'Yam'=>'Yam'
                        ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('no_telpon')->searchable(),
                TextColumn::make('masuk')->searchable(),
                TextColumn::make('selesai')->searchable(),
                TextColumn::make('petugas')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPoskoNarus::route('/'),
            'create' => Pages\CreatePoskoNaru::route('/create'),
            'edit' => Pages\EditPoskoNaru::route('/{record}/edit'),
        ];
    }    
}
