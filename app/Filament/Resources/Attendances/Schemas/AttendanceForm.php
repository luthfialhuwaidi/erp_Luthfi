<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employee_id')
                    ->relationship('employee', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => $record->user?->name ?? "Employee #{$record->id}"
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('date')
                    ->required()
                    ->default(now()),

                TimePicker::make('check_in')
                    ->seconds(false),

                TimePicker::make('check_out')
                    ->seconds(false),

                Select::make('status')
                    ->options([
                        'present' => 'Present',
                        'late' => 'Late',
                        'absent' => 'Absent',
                        'permission' => 'Permission',
                        'sick' => 'Sick',
                    ])
                    ->required()
                    ->default('present'),

                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}