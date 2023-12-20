<?php

namespace App\Filament\Resources\CharacterTypeResource\Pages;

use App\Filament\Resources\CharacterTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacterType extends EditRecord
{
    protected static string $resource = CharacterTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
