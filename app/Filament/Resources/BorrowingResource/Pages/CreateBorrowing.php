<?php

namespace App\Filament\Resources\BorrowingResource\Pages;

use App\Models\Book;
use App\Filament\Resources\BorrowingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function afterCreate(): void
    {
        $borrowing = $this->record;

        $book = Book::find($borrowing->book_id);

        if ($book && $book->stock > 0) {
            $book->decrement('stock');
        }
    }
}
