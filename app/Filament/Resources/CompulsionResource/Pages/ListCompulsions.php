<?php

namespace App\Filament\Resources\CompulsionResource\Pages;

use App\Filament\Resources\CompulsionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompulsions extends ListRecords
{
    protected static string $resource = CompulsionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
