<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_barang'),
                TextColumn::make('nama_barang')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make()
                    ->color('danger')
                    ->hidden(fn($record) => $record->mutasiStoks()->exists()),
            ]);
    }
}
