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
                            ])
                            ->columns(8),
                    ]),
                Forms\Components\Group::make()
                    ->relationship('attributes')
                    ->schema([
                        Forms\Components\Fieldset::make('Basis Werte')
                            ->schema([
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
                            ])
                            ->columns(4)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
