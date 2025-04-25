<?php

namespace App\Filament\Distt\Resources;

use App\Filament\Distt\Resources\BlockCoordinatorResource\Pages;
use App\Filament\Distt\Resources\BlockCoordinatorResource\RelationManagers;
use App\Models\BlockCoordinator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlockCoordinatorResource extends Resource
{
    protected static ?string $model = BlockCoordinator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Block Coordinator Name'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique(ignorable: fn($record) => $record)
                    ->required()
                    ->label('Vendor Email'),

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
                    ->label('District (State Name)'),

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
            'index' => Pages\ListBlockCoordinators::route('/'),
            'create' => Pages\CreateBlockCoordinator::route('/create'),
            'edit' => Pages\EditBlockCoordinator::route('/{record}/edit'),
        ];
    }
}
