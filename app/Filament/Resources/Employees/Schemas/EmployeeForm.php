<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Information')
                    ->icon('heroicon-o-user')
                    ->columnSpan(2)
                    ->schema([
                        Group::make()
                        ->relationship('user')
                            ->schema([
                                TextInput::make('name')
                                    ->placeholder('Enter name')
                                    ->required(),
                                TextInput::make('email')
                                    ->placeholder('Enter email')
                                    ->label('Email Address')
                                    ->required(),
                                TextInput::make('password')
                                    ->placeholder('Enter password')
                                    ->required()
                                    ->password(),
                                    ]),
                            ]),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('position_id')
                    ->relationship('position', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('pob'),
                DatePicker::make('dob'),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->nullable(),
                Select::make('religion')
                    ->options([
                        'islam' => 'Islam',
                        'katolik' => 'Katolik',
                        'protestan' => 'Protestan',
                        'hindu' => 'Hindu',
                        'buddha' => 'Buddha',
                        'konghucu' => 'Konghucu',
                    ])
                    ->required(),
                TextInput::make('phone_number')
                    ->tel(),
                TextInput::make('salary')
                    ->required()
                    ->numeric()
                    ->default(0),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                Select::make('status')
                    ->options([
                        'applicant' => 'Applicant',
                        'active' => 'Active',
                        'trainee' => 'Trainee',
                        'x' => 'X',
                    ])
                    ->nullable(),
                    ]);
    }
}
