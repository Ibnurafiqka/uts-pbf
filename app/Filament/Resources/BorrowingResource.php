<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowingResource\Pages;
use App\Filament\Resources\BorrowingResource\RelationManagers;
use App\Models\Borrowing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BorrowingResource extends Resource
{
    protected static ?string $model = Borrowing::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?String $navigationGroup = 'Loan';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')->label('Peminjam')->relationship('user', 'name'),
                Forms\Components\Select::make('book_id')->label('Buku')->relationship('book', 'title'),
                Forms\Components\DatePicker::make('borrow_date')->label('Tanggal Pinjam')->required()->default(now()),
                Forms\Components\DatePicker::make('return_date')->label('Jatuh Tempo'),
                Forms\Components\DatePicker::make('actual_return_date')->label('Tanggal Pengembalian')->nullable(),
                Forms\Components\TextInput::make('fine')->label('Denda (Rp)')->numeric()->default(0),
                Forms\Components\Textarea::make('notes')->label('Catatan')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Peminjam'),
                Tables\Columns\TextColumn::make('book.title')->label('Judul Buku'),
                Tables\Columns\TextColumn::make('borrow_date')->label('Pinjam')->date(),
                Tables\Columns\TextColumn::make('return_date')->label('Jatuh Tempo')->date(),
                Tables\Columns\TextColumn::make('actual_return_date')->label('Kembali')->date(),
                //Tables\Columns\IconColumn::make('returned')->label('Status')->boolean()->trueIcon('heroicon-o-check-circle')->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        return $record->returned ? 'Returned' : 'On Loan';
                    })
                    ->colors([
                        'success' => 'Returned',
                        'warning' => 'On Loan',
                    ])
                    ->color(function ($state) {
                        return match ($state) {
                            'Returned' => 'success',
                            'On Loan' => 'warning',
                            default => 'gray',
                        };
                    }),
                Tables\Columns\TextColumn::make('fine')->label('Denda')->money('IDR'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('returned')
                    ->label('Status')
                    ->options([
                        false => 'On Loan',
                        true => 'Returned',
                    ]),
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
            'index' => Pages\ListBorrowings::route('/'),
            'create' => Pages\CreateBorrowing::route('/create'),
            'edit' => Pages\EditBorrowing::route('/{record}/edit'),
        ];
    }
}
