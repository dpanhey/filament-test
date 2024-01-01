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
                Forms\Components\Fieldset::make('Physical Skills')
                ->schema([

                    ]),
            ]);
    }
}
