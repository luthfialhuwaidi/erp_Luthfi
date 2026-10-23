<?php

namespace App\Filament\Resources\SkillTypes\Pages;

use App\Filament\Resources\SkillTypes\SkillTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSkillType extends EditRecord
{
    protected static string $resource = SkillTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
