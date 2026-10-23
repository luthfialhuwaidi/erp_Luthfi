<?php

namespace App\Filament\Resources\SkillLevels\Pages;

use App\Filament\Resources\SkillLevels\SkillLevelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSkillLevel extends EditRecord
{
    protected static string $resource = SkillLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
