<?php

namespace App\Filament\Resources\BloodPotencyResource\Pages;

use App\Filament\Resources\BloodPotencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBloodPotency extends EditRecord
{
    protected static string $resource = BloodPotencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
