<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required()->unique(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn($state) => bcrypt($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->label('Password'),
                Forms\Components\TextInput::make('phone'),

                Select::make('state')
                    ->required()
                    ->label('State')
                    ->options([
                        'Andhra Pradesh' => 'Andhra Pradesh',
                        'Arunachal Pradesh' => 'Arunachal Pradesh',
                        'Assam' => 'Assam',
                        'Bihar' => 'Bihar',
                        'Chhattisgarh' => 'Chhattisgarh',
                        'Goa' => 'Goa',
                        'Gujarat' => 'Gujarat',
                        'Haryana' => 'Haryana',
                        'Himachal Pradesh' => 'Himachal Pradesh',
                        'Jharkhand' => 'Jharkhand',
                        'Karnataka' => 'Karnataka',
                        'Kerala' => 'Kerala',
                        'Madhya Pradesh' => 'Madhya Pradesh',
                        'Maharashtra' => 'Maharashtra',
                        'Manipur' => 'Manipur',
                        'Meghalaya' => 'Meghalaya',
                        'Mizoram' => 'Mizoram',
                        'Nagaland' => 'Nagaland',
                        'Odisha' => 'Odisha',
                        'Punjab' => 'Punjab',
                        'Rajasthan' => 'Rajasthan',
                        'Sikkim' => 'Sikkim',
                        'Tamil Nadu' => 'Tamil Nadu',
                        'Telangana' => 'Telangana',
                        'Tripura' => 'Tripura',
                        'Uttar Pradesh' => 'Uttar Pradesh',
                        'Uttarakhand' => 'Uttarakhand',
                        'West Bengal' => 'West Bengal',
                        'Andaman and Nicobar Islands' => 'Andaman and Nicobar Islands',
                        'Chandigarh' => 'Chandigarh',
                        'Dadra and Nagar Haveli and Daman and Diu' => 'Dadra and Nagar Haveli and Daman and Diu',
                        'Delhi' => 'Delhi',
                        'Jammu and Kashmir' => 'Jammu and Kashmir',
                        'Ladakh' => 'Ladakh',
                        'Lakshadweep' => 'Lakshadweep',
                        'Puducherry' => 'Puducherry',
                    ])
                    ->searchable(),

                Forms\Components\Textarea::make('address'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
