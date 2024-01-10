<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use App\Models\Character;
use Blueprint\Models\Model;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacterAttributes extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected static ?string $navigationLabel = 'Edit Character Attributes';

    // protected ?string $heading = 'Edit Character Attributes';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'Edit Character Attributes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->relationship('attributes')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\Fieldset::make('Basis Attribute')
                            ->schema([
                                Forms\Components\TextInput::make('courage')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sagacity')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('intuition')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('charisma')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('dexterity')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('agility')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('constitution')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('strength')
                                    ->maxLength(255),
                            ])
                            ->columns(8),
                    ]),
                Forms\Components\Group::make()
                    ->relationship('attributes')
                    ->schema([
                        Forms\Components\Fieldset::make('Basis Werte')
                            ->schema([
                                Forms\Components\TextInput::make('life_points')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('arcane_energy')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('karma_points')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('spirit')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('toughness')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('dodge')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('initiative')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('movement')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('fate_points')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('carrying_capacity')
                                    ->maxLength(255),
                            ])
                            ->columns(4)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
