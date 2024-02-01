<?php

namespace App\Filament\Resources\CompulsionResource\Pages;

use App\Filament\Resources\CompulsionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompulsion extends EditRecord
{
    protected static string $resource = CompulsionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
