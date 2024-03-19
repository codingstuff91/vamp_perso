<?php

namespace App\Filament\Resources\BackgroundTypeResource\Pages;

use App\Filament\Resources\BackgroundTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBackgroundType extends EditRecord
{
    protected static string $resource = BackgroundTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
