<?php

namespace App\Filament\Resources\Companies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompaniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
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
                ImageColumn::make('logo')
                    ->disk('public')
                    // ->directory('logos')
                    ->visibility('public'),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            // ->recordActions([
            //     EditAction::make(),
            //     DeleteAction::make(),
            // ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }

}
