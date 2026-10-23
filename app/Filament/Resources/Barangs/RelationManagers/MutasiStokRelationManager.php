<?php

namespace App\Filament\Resources\Barangs\RelationManagers;

use App\Filament\Resources\MutasiStoks\MutasiStokResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class MutasiStokRelationManager extends RelationManager
{
    protected static string $relationship = 'mutasiStoks';

    protected static ?string $relatedResource = MutasiStokResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
