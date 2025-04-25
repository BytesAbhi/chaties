<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\BankdetailsResource\Pages;
use App\Filament\Vendor\Resources\BankdetailsResource\RelationManagers;
use App\Models\Bankdetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BankdetailsResource extends Resource
{
    protected static ?string $model = Bankdetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Bank Name Field
                Forms\Components\TextInput::make('bank_name')
                    ->label('Bank Name')
                    ->required()
                    ->maxLength(255),

                // Account Number Field
                Forms\Components\TextInput::make('account_number')
                    ->label('Account Number')
                    ->required()
                    ->maxLength(20),

                // Account Holder Name Field
                Forms\Components\TextInput::make('account_holder_name')
                    ->label('Account Holder Name')
                    ->required()
                    ->maxLength(255),

                // IFSC Code Field
                Forms\Components\TextInput::make('ifsc_code')
                    ->label('IFSC Code')
                    ->required()
                    ->maxLength(11),

                // Branch Name Field
                Forms\Components\TextInput::make('branch_name')
                    ->label('Branch Name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Vendor Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('bank_name')
                    ->label('Bank Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('account_number')
                    ->label('Account Number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('account_holder_name')
                    ->label('Account Holder Name'),

                Tables\Columns\TextColumn::make('ifsc_code')
                    ->label('IFSC Code'),

                Tables\Columns\TextColumn::make('branch_name')
                    ->label('Branch Name'),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'State Coordinator')
            ->where('holder_id', auth('block')->id());
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBankdetails::route('/'),
            'create' => Pages\CreateBankdetails::route('/create'),
            'edit' => Pages\EditBankdetails::route('/{record}/edit'),
        ];
    }
}
