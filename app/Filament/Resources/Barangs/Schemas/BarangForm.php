<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->placeholder('BRG-001')
                    ->required(),
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required(),
                TextInput::make('kategori')
                    ->label('Kategori')
                    ->placeholder('Contoh: Elektronik'),
                TextInput::make('satuan')
                    ->label('Satuan')
                    ->placeholder('Contoh: Kertas = Rim / motor = listrik / ')
                    ->required(),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('stok_minimum')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
