<?php

namespace App\Filament\Resources\PelangganResource\Pages;

use App\Filament\Resources\PelangganResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPelanggan extends ViewRecord
{
    protected static string $resource = PelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
