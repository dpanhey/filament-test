<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCharacter extends ViewRecord
{
    protected static ?string $navigationLabel = 'View Character Sheet';

    // protected ?string $heading = 'View Character Sheet';
    public function getHeading(): string
    {
        return $this->record->character_name;
    }

    protected ?string $subheading = 'View Character Sheet';

    protected static string $resource = CharacterResource::class;
}
