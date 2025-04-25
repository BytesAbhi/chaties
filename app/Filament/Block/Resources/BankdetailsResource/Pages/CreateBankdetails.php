<?php

namespace App\Filament\Block\Resources\BankdetailsResource\Pages;

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

        $data['holder_id'] = Auth::guard('block')->user()->id;
        $data['name'] = Auth::guard('block')->user()->name;
        $data['role'] = 'Block Coordinator';


        return Bankdetails::create($data);
    }
}
