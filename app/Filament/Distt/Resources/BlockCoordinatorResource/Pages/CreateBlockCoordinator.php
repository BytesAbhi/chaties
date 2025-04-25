<?php

namespace App\Filament\Distt\Resources\BlockCoordinatorResource\Pages;

use App\Filament\Distt\Resources\BlockCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBlockCoordinator extends CreateRecord
{
    protected static string $resource = BlockCoordinatorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['distt_coord'] = Auth::id();
        return $data;
    }
}
