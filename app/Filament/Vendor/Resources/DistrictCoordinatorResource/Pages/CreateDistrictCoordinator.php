<?php

namespace App\Filament\Vendor\Resources\DistrictCoordinatorResource\Pages;

use App\Filament\Vendor\Resources\DistrictCoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateDistrictCoordinator extends CreateRecord
{
    protected static string $resource = DistrictCoordinatorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['vendor_id'] = Auth::id();
        return $data;
    }

}
