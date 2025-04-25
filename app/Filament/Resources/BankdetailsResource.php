<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BankdetailsResource\Pages;
use App\Filament\Resources\BankdetailsResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Bank Details';
    protected static ?string $pluralLabel = 'Bank Details';
    protected static ?string $label = 'Bank Detail';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Coordinator Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('role')->searchable(),
                Tables\Columns\TextColumn::make('bank_name')->searchable(),
                Tables\Columns\TextColumn::make('account_number')->searchable(),
                Tables\Columns\TextColumn::make('account_holder_name'),
                Tables\Columns\TextColumn::make('ifsc_code'),
                Tables\Columns\TextColumn::make('branch_name'),
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
            'index' => Pages\ListBankdetails::route('/'),
            // 'create' => Pages\CreateBankdetails::route('/create'),
            'edit' => Pages\EditBankdetails::route('/{record}/edit'),
        ];
    }
}
