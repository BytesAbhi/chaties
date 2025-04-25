<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DistrictCoordinatorResource\Pages;
use App\Filament\Resources\DistrictCoordinatorResource\RelationManagers;
use App\Models\DistrictCoordinator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DistrictCoordinatorResource extends Resource
{
    protected static ?string $model = DistrictCoordinator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('district'),
                Tables\Columns\TextColumn::make('vendor_id'),
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
            'index' => Pages\ListDistrictCoordinators::route('/'),
            'create' => Pages\CreateDistrictCoordinator::route('/create'),
            'edit' => Pages\EditDistrictCoordinator::route('/{record}/edit'),
        ];
    }
}
