<?php

namespace App\Filament\Vendor\Resources\EarningResource\Pages;

use App\Filament\Vendor\Resources\EarningResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEarning extends EditRecord
{
    protected static string $resource = EarningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
