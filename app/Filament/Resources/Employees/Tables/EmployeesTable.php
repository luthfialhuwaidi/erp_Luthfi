<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Picture')
                    ->disk('public')
                    ->visibility('public')
                    ->width(60)
                    ->height(60)
                    ->circular(),
                TextColumn::make('user.name')//user.name mengambil nilai dari relasi user
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('position.name')
                    ->label('Position Name')
                    ->sortable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
