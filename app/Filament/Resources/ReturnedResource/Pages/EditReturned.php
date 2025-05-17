<?php

namespace App\Filament\Resources\ReturnedResource\Pages;

use App\Filament\Resources\ReturnedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReturned extends EditRecord
{
    protected static string $resource = ReturnedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
