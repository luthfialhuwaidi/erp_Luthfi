<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Console\Attributes\Description;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company Information')
                    ->icon('heroicon-o-building-office')
                    ->description('Please fill in the following information about the company.')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),
                        Textarea::make('address')
                            ->rows(3)
                            ->extraInputAttributes(['style' => 'resize: none;'])
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        TextInput::make('phone_number')
                            ->tel()
                            ->required(),

                    ]),
                Section::make('Company Logo')
                    ->description('Upload the company logo.')
                    ->components([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('logos')
                            ->visibility('public'),
                    ]),
            ])->columns(3);
    }
}
