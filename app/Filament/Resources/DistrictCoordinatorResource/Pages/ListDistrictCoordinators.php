<?php

namespace App\Filament\Resources\DistrictCoordinatorResource\Pages;

use App\Filament\Resources\DistrictCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistrictCoordinators extends ListRecords
{
    protected static string $resource = DistrictCoordinatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
