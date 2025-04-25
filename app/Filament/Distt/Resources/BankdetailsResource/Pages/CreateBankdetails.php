<?php

namespace App\Filament\Distt\Resources\BankdetailsResource\Pages;

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

        $data['holder_id'] = Auth::guard('district')->user()->id;
        $data['name'] = Auth::guard('district')->user()->name;
        $data['role'] = 'District Coordinator';


        return Bankdetails::create($data);
    }
}
