<?php

namespace App\Filament\Distt\Resources\EarningResource\Pages;

use App\Filament\Distt\Resources\EarningResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEarnings extends ListRecords
{
    protected static string $resource = EarningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
