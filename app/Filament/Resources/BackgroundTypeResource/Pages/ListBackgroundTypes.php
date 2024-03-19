<?php

namespace App\Filament\Resources\BackgroundTypeResource\Pages;

use App\Filament\Resources\BackgroundTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBackgroundTypes extends ListRecords
{
    protected static string $resource = BackgroundTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
