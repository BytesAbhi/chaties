<?php

namespace App\Filament\Vendor\Resources\DistrictCoordinatorResource\Pages;

use App\Filament\Vendor\Resources\DistrictCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistrictCoordinator extends EditRecord
{
    protected static string $resource = DistrictCoordinatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
