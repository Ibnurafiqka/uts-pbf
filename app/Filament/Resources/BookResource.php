<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?String $navigationGroup = 'Books';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Judul Buku'),
                Forms\Components\TextInput::make('author')->label('Pengarang'),
                Forms\Components\TextInput::make('publisher')->label('Penerbit'),
                Forms\Components\TextInput::make('year')->label('Tahun Terbit'),
                Forms\Components\TextInput::make('isbn')->label('ISBN'),
                Forms\Components\TextInput::make('stock')->label('Stok Buku'),
                Forms\Components\Toggle::make('status')->label('Boleh Dipinjam'),
                //Forms\Components\Select::make('category')->label('Genre')->relationship('category', 'name'),
                Forms\Components\Select::make('category_id')->label('Genre')->relationship('category', 'name'),
                Forms\Components\FileUpload::make('cover_image')->label('Cover Buku')->image()->directory('covers'),
                Forms\Components\Textarea::make('description')->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('title')->label('Judul'),
            Tables\Columns\TextColumn::make('author')->label('Pengarang'),
            Tables\Columns\TextColumn::make('publisher')->label('Penerbit'),
            Tables\Columns\TextColumn::make('year')->label('Tahun'),
            Tables\Columns\TextColumn::make('isbn')->label('ISBN')->toggleable(),
            Tables\Columns\TextColumn::make('stock')->label('Stok'),
            Tables\Columns\IconColumn::make('status')->label('Boleh Dipinjam')->boolean(),
            Tables\Columns\TextColumn::make('category.name')->label('Kategori')->sortable()->searchable(),
            //Tables\Columns\ImageColumn::make('cover_image')->label('Cover')->circular(),
            Tables\Columns\BadgeColumn::make('availability')
                ->label('Ketersediaan')
                ->getStateUsing(function ($record) {
                    if ($record->stock <= 0) {
                        return 'Out of Stock';
                    }
                    return $record->status ? 'Available' : 'Unavailable';
                })
                ->colors([
                    'danger' => 'Out of Stock',
                    'success' => 'Available',
                    'gray' => 'Unavailable',
                ])
                ->color(function ($state) {
                    return match ($state) {
                        'Available' => 'success',
                        'Out of Stock' => 'danger',
                        'Unavailable' => 'gray',
                        default => 'gray',
                    };
                }),
            Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui')->dateTime('d M Y'),
        ])
        
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-s-eye')
                    ->label('')
                    ->tooltip('Lihat Detail'),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
