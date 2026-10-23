<?php

namespace App\Filament\Resources\MutasiStoks\Pages;

use App\Filament\Resources\MutasiStoks\MutasiStokResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMutasiStoks extends ManageRecords
{
    protected static string $resource = MutasiStokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
