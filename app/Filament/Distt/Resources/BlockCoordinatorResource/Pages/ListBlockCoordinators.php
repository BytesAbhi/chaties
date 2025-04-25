<?php

namespace App\Filament\Distt\Resources\BlockCoordinatorResource\Pages;

use App\Filament\Distt\Resources\BlockCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlockCoordinators extends ListRecords
{
    protected static string $resource = BlockCoordinatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
