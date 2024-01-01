<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditCharacterMeta extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected static ?string $navigationLabel = 'Edit Character Meta Data';

    // protected ?string $heading = 'Edit Character Meta Data';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'Edit Character Meta Data';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Fieldset::make('Meta-Daten')
                ->schema([
                    Forms\Components\Select::make('character_type_id')
                        ->relationship('characterType', 'name')
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required(),
                        ]),
                    Forms\Components\Select::make('experience_level_id')
                        ->relationship('experienceLevel', 'name')
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required(),
                            Forms\Components\TextInput::make('adventure_points')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('maximum_attribute_value')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('maximum_skill_value')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('maximum_combat_technique_value')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('maximum_attribute_points')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('total_number_spells_rituals')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('number_foreign_spells')
                                ->required()
                                ->numeric(),
                        ]),
                    Forms\Components\TextInput::make('total_ap')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('ap_unused')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('ap_used')
                        ->required()
                        ->numeric(),
                    Forms\Components\Toggle::make('alive')
                        ->required()
                        ->onIcon('heroicon-m-user')
                        ->offIcon('heroicon-m-bolt')
                        ->offColor('danger')
                    ->inline(false),
                ])
                ->columns(3),
            ]);
    }
}
