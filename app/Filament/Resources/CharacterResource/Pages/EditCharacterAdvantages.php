<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditCharacterAdvantages extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected static ?string $navigationLabel = 'Edit Advantages & Disadvantages';

    // protected ?string $heading = 'Edit Character Advantages';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'Edit Character Advantages & Disadvantages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('advantagecharacters')
                    ->relationship('advantagecharacters')
                    ->schema([
                        Forms\Components\Select::make('advantage_id')
                            ->relationship('advantage', 'name')
                            ->required(),
                    ])
                    ->columnStart(0)
                    ->columnSpan(1),
                Forms\Components\Repeater::make('characterdisadvantages')
                    ->relationship('characterdisadvantages')
                    ->schema([
                        Forms\Components\Select::make('disadvantage_id')
                            ->relationship('disadvantage', 'name')
                            ->required(),
                    ])
                    ->columnStart(0)
                    ->columnSpan(1),
            ]);
    }
}
