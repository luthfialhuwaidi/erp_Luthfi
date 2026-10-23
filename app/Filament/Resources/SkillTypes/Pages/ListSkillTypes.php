<?php

namespace App\Filament\Resources\SkillTypes\Pages;

use App\Filament\Resources\SkillTypes\SkillTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSkillTypes extends ListRecords
{
    protected static string $resource = SkillTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
