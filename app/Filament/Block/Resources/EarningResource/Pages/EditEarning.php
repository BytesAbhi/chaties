<?php

namespace App\Filament\Block\Resources\EarningResource\Pages;

use App\Filament\Block\Resources\EarningResource;
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
