<?php

namespace App\Filament\Block\Resources\BankdetailsResource\Pages;

use App\Filament\Block\Resources\BankdetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBankdetails extends ListRecords
{
    protected static string $resource = BankdetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
