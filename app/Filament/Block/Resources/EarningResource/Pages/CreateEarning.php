<?php

namespace App\Filament\Block\Resources\EarningResource\Pages;

use App\Filament\Block\Resources\EarningResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEarning extends CreateRecord
{
    protected static string $resource = EarningResource::class;
}
