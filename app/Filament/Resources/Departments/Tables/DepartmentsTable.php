<?php

namespace App\Filament\Resources\Departments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DepartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->formatStateUsing(function ($state) {
                        $state = preg_replace('/[^0-9]/', '', $state); // ambil digit saja
            
                        // Format: 0812-3456-7890 (4-4-4)
                        $prefix = substr($state, 0, 4);
                        $mid = substr($state, 4, 4);
                        $suffix = substr($state, 8);

                        return $prefix . '-' . $mid . '-' . $suffix;
                    })
                    ->searchable(),
            ])
            ->filters([
                //
            ]);
            // ->recordActions([
            //     EditAction::make(),
            // ])
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ]);
    }
}
