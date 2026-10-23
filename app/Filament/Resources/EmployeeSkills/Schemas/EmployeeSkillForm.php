<?php

namespace App\Filament\Resources\EmployeeSkills\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EmployeeSkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_id')
                    ->required()
                    ->numeric(),
                TextInput::make('skill_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('skill_level_id')
                    ->required()
                    ->numeric(),
                TextInput::make('skill_id')
                    ->required()
                    ->numeric(),
                TextInput::make('level_progress')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_default_level')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                DatePicker::make('effective_date'),
                DatePicker::make('expiry_date'),
            ]);
    }
}
