<?php

namespace App\Filament\Resources\BorrowingResource\Pages;

use App\Filament\Resources\BorrowingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBorrowing extends EditRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $borrowing = $this->record;

        if ($borrowing->actual_return_date && !$borrowing->getOriginal('actual_return_date')) {
         $book = $borrowing->book;
            $book->increment('stock');
        }
    }

}
