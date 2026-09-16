<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company Information')
                    ->description('Please fill in the company information of your company')
                    ->columns(2)
                    ->columnSpan(3)
                    ->schema([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('address')
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

                Section::make('Companies Logo')
                    ->description('Please upload the company logo')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('logos')
                            ->maxSize(1024)
                            ->visibility('public'),
                    ]),


            ])->columns(4);
    }
}
