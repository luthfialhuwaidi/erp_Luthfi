<?php

namespace App\Filament\Resources\EmployeeSkills\Pages;

use App\Filament\Resources\EmployeeSkills\EmployeeSkillResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeSkills extends ListRecords
{
    protected static string $resource = EmployeeSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
