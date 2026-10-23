<?php

namespace App\Filament\Resources\SkillLevels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('skill_type_id')
                    ->label('Skill Type')
                    ->relationship('skillType', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
            ]);
    }
}
