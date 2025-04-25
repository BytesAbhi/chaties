<?php

namespace App\Filament\Vendor\Resources\BankdetailsResource\Pages;

use App\Filament\Block\Resources\BankdetailsResource;
use App\Models\Bankdetails;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBankdetails extends CreateRecord
{
    protected static string $resource = BankdetailsResource::class;


    protected function handleRecordCreation(array $data): Bankdetails
    {

        $data['holder_id'] = Auth::guard('vendor')->user()->id;
        $data['name'] = Auth::guard('vendor')->user()->name;
        $data['role'] = 'State Coordinator';


        return Bankdetails::create($data);
    }
}
