<?php

namespace App\Filament\Block\Resources;

use App\Filament\Block\Resources\BankdetailsResource\Pages;
use App\Models\Bankdetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BankdetailsResource extends Resource
{
    protected static ?string $model = Bankdetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Bank Details';
    protected static ?string $pluralLabel = 'Bank Details';
    protected static ?string $label = 'Bank Detail';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bank_name')
                    ->label('Bank Name')
                    ->required(),

                Forms\Components\TextInput::make('account_number')
                    ->label('Account Number')
                    ->required(),

                Forms\Components\TextInput::make('account_holder_name')
                    ->label('Account Holder Name')
                    ->required(),

                Forms\Components\TextInput::make('ifsc_code')
                    ->label('IFSC Code')
                    ->required(),

                Forms\Components\TextInput::make('branch_name')
                    ->label('Branch Name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Coordinator Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('bank_name')->searchable(),
                Tables\Columns\TextColumn::make('account_number')->searchable(),
                Tables\Columns\TextColumn::make('account_holder_name'),
                Tables\Columns\TextColumn::make('ifsc_code'),
                Tables\Columns\TextColumn::make('branch_name'),
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

    // 👇 Only show records where role is 'block' and created by the logged-in block coordinator
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'Block Coordinator')
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
