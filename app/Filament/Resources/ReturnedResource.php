<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReturnedResource\Pages;
use App\Filament\Resources\ReturnedResource\RelationManagers;
use App\Models\Returned;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReturnedResource extends Resource
{
    protected static ?string $model = Returned::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-left';
    protected static ?String $navigationGroup = 'Loan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListReturneds::route('/'),
            'create' => Pages\CreateReturned::route('/create'),
            'edit' => Pages\EditReturned::route('/{record}/edit'),
        ];
    }
}
