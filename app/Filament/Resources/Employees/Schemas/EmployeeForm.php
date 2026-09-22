<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
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
