<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeResource\Pages;
use App\Filament\Resources\AttributeResource\RelationManagers;
use App\Models\Attribute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('character_id')
                    ->relationship('character', 'character_name')
                    ->required(),
                Forms\Components\TextInput::make('courage')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sagacity')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('intuition')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('charisma')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dexterity')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('agility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('constitution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('strength')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('life_points')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('arcane_energy')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('karma_points')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('spirit')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('toughness')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dodge')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('initiative')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('movement')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fate_points')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('carrying_capacity')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('character_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('courage')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sagacity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('intuition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('charisma')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dexterity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('constitution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('strength')
                    ->searchable(),
                Tables\Columns\TextColumn::make('life_points')
                    ->searchable(),
                Tables\Columns\TextColumn::make('arcane_energy')
                    ->searchable(),
                Tables\Columns\TextColumn::make('karma_points')
                    ->searchable(),
                Tables\Columns\TextColumn::make('spirit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('toughness')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dodge')
                    ->searchable(),
                Tables\Columns\TextColumn::make('initiative')
                    ->searchable(),
                Tables\Columns\TextColumn::make('movement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fate_points')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrying_capacity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAttributes::route('/'),
            'create' => Pages\CreateAttribute::route('/create'),
            'edit' => Pages\EditAttribute::route('/{record}/edit'),
        ];
    }
}
