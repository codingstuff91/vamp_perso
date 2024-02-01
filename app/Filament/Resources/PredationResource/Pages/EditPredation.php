<?php

namespace App\Filament\Resources\PredationResource\Pages;

use App\Filament\Resources\PredationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPredation extends EditRecord
{
    protected static string $resource = PredationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
