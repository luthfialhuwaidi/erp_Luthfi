<?php

namespace App\Filament\Resources\SkillTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
