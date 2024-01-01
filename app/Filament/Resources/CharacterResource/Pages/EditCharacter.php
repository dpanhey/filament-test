<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use App\Models\Character;
use Blueprint\Models\Model;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacter extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected static ?string $navigationLabel = 'Edit Personal Information';

    // protected ?string $heading = 'Edit Personal Information';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'Edit Personal Information';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Persönliche Daten')
                    ->schema([
                        Forms\Components\TextInput::make('character_name'),
                        Forms\Components\TextInput::make('family'),
                        Forms\Components\TextInput::make('place_of_birth'),
                        Forms\Components\TextInput::make('date_of_birth'),
                        Forms\Components\TextInput::make('sex'),
                        Forms\Components\TextInput::make('size')
                            ->numeric(),
                        Forms\Components\TextInput::make('age')
                            ->numeric(),
                        Forms\Components\TextInput::make('weight')
                            ->numeric(),
                        Forms\Components\TextInput::make('hair_color'),
                        Forms\Components\TextInput::make('eye_color'),
                        Forms\Components\TextInput::make('title'),
                        Forms\Components\TextInput::make('social_status'),
                        Forms\Components\Select::make('species_id')
                            ->relationship('species', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('ap_value')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\Select::make('culture_id')
                            ->relationship('culture', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('ap_value')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\Select::make('profession_id')
                            ->relationship('profession', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\Select::make('profession_group_id')
                                    ->relationship('professionGroup', 'name')
                                    ->required()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                    ]),
                            ])
                            ->columnspan(2),
                        Forms\Components\Textarea::make('characteristics')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('backstory')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('other_information')
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
