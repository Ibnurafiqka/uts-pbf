<?php

namespace App\Filament\Resources\ReturnedResource\Pages;

use App\Filament\Resources\ReturnedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReturneds extends ListRecords
{
    protected static string $resource = ReturnedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
