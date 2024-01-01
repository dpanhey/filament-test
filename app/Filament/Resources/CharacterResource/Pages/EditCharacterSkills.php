<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use App\Models\Character;
use Blueprint\Models\Model;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacterSkills extends EditRecord
{
    protected static ?string $navigationLabel = 'Edit Character Skills';

    // protected ?string $heading = 'Edit Character Skills';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'Edit Character Skills';

    protected static string $resource = CharacterResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Character Skills')
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
                ]),
            ]);
    }
}
