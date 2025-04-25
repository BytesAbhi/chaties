<?php

namespace App\Filament\Block\Resources;

use App\Filament\Block\Resources\EarningResource\Pages;
use App\Filament\Block\Resources\EarningResource\RelationManagers;
use App\Models\Earning;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EarningResource extends Resource
{
    protected static ?string $model = Earning::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('total_earnings')
                ->label('Total Earnings')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('blockCoordinator.name')->label('Block Coordinator'),
                Tables\Columns\TextColumn::make('total_earnings')->label('Total Earnings'),
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
            'index' => Pages\ListEarnings::route('/'),
            'create' => Pages\CreateEarning::route('/create'),
            'edit' => Pages\EditEarning::route('/{record}/edit'),
        ];
    }
}
