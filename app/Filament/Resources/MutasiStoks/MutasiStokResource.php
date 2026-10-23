<?php

namespace App\Filament\Resources\MutasiStoks;

use App\Filament\Resources\MutasiStoks\Pages\ManageMutasiStoks;
use App\Models\MutasiStok;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class MutasiStokResource extends Resource
{
    protected static ?string $model = MutasiStok::class;
    
    protected static string|UnitEnum|null $navigationGroup = 'Inventory';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_barang';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('barang_id') // Harus sesuai dengan nama kolom foreign key di tabel
                    ->relationship('barang', 'nama_barang') // ('nama_relasi_di_model', 'kolom_yang_ditampilkan')
                    ->label('Nama Barang')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('tipe') // Ubah dari TextInput menjadi Select agar user tidak salah ketik
                    ->options([
                        'masuk' => 'Masuk',
                        'keluar' => 'Keluar',
                    ])
                    ->required(),

                TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->minValue(1), // Tambahan pengaman agar tidak bisa input 0 atau minus

                Textarea::make('keterangan')
                    ->columnSpanFull(),

                DatePicker::make('tanggal')
                    ->required()
                    ->default(now()), // Otomatis terisi tanggal hari ini
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('MutasiStok')
            ->columns([
                TextColumn::make('barang_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tipe')
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
            ]);
            
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageMutasiStoks::route('/'),
        ];
    }
}
