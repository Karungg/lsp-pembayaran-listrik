<?php

namespace App\Filament\Resources\TarifListrikResource\Pages;

use App\Filament\Resources\TarifListrikResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTarifListrik extends ViewRecord
{
    protected static string $resource = TarifListrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
