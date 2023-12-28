<?php

namespace App\Filament\Resources\DisadvantageResource\Pages;

use App\Filament\Resources\DisadvantageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDisadvantage extends EditRecord
{
    protected static string $resource = DisadvantageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
