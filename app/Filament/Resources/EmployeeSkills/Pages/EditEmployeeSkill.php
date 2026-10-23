<?php

namespace App\Filament\Resources\EmployeeSkills\Pages;

use App\Filament\Resources\EmployeeSkills\EmployeeSkillResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeSkill extends EditRecord
{
    protected static string $resource = EmployeeSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
