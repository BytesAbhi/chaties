<?php

namespace App\Filament\Vendor\Resources\BankdetailsResource\Pages;

use App\Filament\Vendor\Resources\BankdetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankdetails extends EditRecord
{
    protected static string $resource = BankdetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
