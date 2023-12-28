<?php

namespace App\Filament\Resources\DisadvantageResource\Pages;

use App\Filament\Resources\DisadvantageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDisadvantages extends ListRecords
{
    protected static string $resource = DisadvantageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
