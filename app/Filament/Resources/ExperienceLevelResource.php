<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceLevelResource\Pages;
use App\Filament\Resources\ExperienceLevelResource\RelationManagers;
use App\Models\ExperienceLevel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperienceLevelResource extends Resource
{
    protected static ?string $model = ExperienceLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('adventure_points')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maximum_attribute_value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maximum_skill_value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maximum_combat_technique_value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maximum_attribute_points')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_number_spells_rituals')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_foreign_spells')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('adventure_points')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maximum_attribute_value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maximum_skill_value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maximum_combat_technique_value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maximum_attribute_points')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_number_spells_rituals')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_foreign_spells')
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
            'index' => Pages\ListExperienceLevels::route('/'),
            'create' => Pages\CreateExperienceLevel::route('/create'),
            'edit' => Pages\EditExperienceLevel::route('/{record}/edit'),
        ];
    }
}
