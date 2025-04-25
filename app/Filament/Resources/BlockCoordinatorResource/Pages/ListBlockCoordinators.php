<?php

namespace App\Filament\Resources\BlockCoordinatorResource\Pages;

use App\Filament\Resources\BlockCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlockCoordinators extends ListRecords
{
    protected static string $resource = BlockCoordinatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
