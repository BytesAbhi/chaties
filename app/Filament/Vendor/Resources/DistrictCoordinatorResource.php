<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\DistrictCoordinatorResource\Pages;
use App\Filament\Vendor\Resources\DistrictCoordinatorResource\RelationManagers;
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

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Distt Coordinator Name'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique(ignorable: fn($record) => $record)
                    ->required()
                    ->label('Coordinator Email'),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('Password')
                    ->dehydrateStateUsing(fn($state) => bcrypt($state)),

                Forms\Components\TextInput::make('contact')
                    ->required()
                    ->label('Contact'),

                Forms\Components\TextArea::make('district')
                    ->nullable()
                    ->label('Operating District'),

                Forms\Components\TextArea::make('address')
                    ->nullable()
                    ->label('Address'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('district'),
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
            'index' => Pages\ListDistrictCoordinators::route('/'),
            'create' => Pages\CreateDistrictCoordinator::route('/create'),
            'edit' => Pages\EditDistrictCoordinator::route('/{record}/edit'),
        ];
    }
}
