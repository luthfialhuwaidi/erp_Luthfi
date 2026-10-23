<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // buat schema dari #[Fillable(['name', 'description', 'allowance'])]
                Section::make('Department')
                    ->icon('heroicon-o-building-office')
                    ->description('Please fill in the details for the department')
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Department Name')
                            ->columnSpanFull()
                            ->required()
                        ,
                        TextInput::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                        ,
                        Textarea::make('address')
                            ->rows(3)
                            ->extraInputAttributes(['style' => 'resize: none;'])
                            ->columnSpanFull()
                        ,
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                        ,
                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->tel()
                        ,
                    ])
                    ->columns(2),
            ]);
    }
}
