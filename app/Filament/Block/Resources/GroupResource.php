<?php

namespace App\Filament\Block\Resources;

use App\Filament\Block\Resources\GroupResource\Pages;
use App\Filament\Block\Resources\GroupResource\RelationManagers;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Name field
            Forms\Components\TextInput::make('name')
                ->label('Group Name')
                ->required()
                ->maxLength(255),

            // Type of group (e.g., School, College, etc.)
            Forms\Components\Select::make('type')
                ->label('Group Type')
                ->options([
                    'school' => 'School',
                    'college' => 'College',
                    'university' => 'University',
                    'company' => 'Company',
                    'ngo' => 'NGO',
                    'other' => 'Other',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Group Name')
                    ->searchable(),

                // Display the group type
                Tables\Columns\TextColumn::make('type')
                    ->label('Group Type')

                    ->searchable(),

                // Created and updated timestamps
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
