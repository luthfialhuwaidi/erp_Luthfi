<?php

namespace App\Filament\Resources\Positions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Position Information')
                    ->description('Please fill in the position information of your company')
                    ->columns(2)
                    ->columnSpan(3)
                    ->schema([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('description')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('allowance')
                            ->columnSpanFull()
                            ->required(),
                    ]),

            ])->columns(4);
    }
}
