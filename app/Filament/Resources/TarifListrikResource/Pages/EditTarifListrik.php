<?php

namespace App\Filament\Resources\TarifListrikResource\Pages;

use App\Filament\Resources\TarifListrikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTarifListrik extends EditRecord
{
    protected static string $resource = TarifListrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
