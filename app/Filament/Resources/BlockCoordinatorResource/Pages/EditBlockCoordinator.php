<?php

namespace App\Filament\Resources\BlockCoordinatorResource\Pages;

use App\Filament\Resources\BlockCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlockCoordinator extends EditRecord
{
    protected static string $resource = BlockCoordinatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
