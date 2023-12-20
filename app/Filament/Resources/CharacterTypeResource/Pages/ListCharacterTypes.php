<?php

namespace App\Filament\Resources\CharacterTypeResource\Pages;

use App\Filament\Resources\CharacterTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCharacterTypes extends ListRecords
{
    protected static string $resource = CharacterTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
