<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Http;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;

class ApiPosts extends Page implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament.pages.api-posts';

    protected static ?string $title = 'Berita';

    protected static BackedEnum|String|null $navigationIcon = Heroicon::Newspaper;

    public function Posts()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $response->json();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => null)
            ->records(fn () => $this->Posts()) // Diubah dibungkus ke dalam Closure/fungsi
            ->columns([
                TextColumn::make('id')->label('Id')->sortable(),
                TextColumn::make('title')->label('Title')->searchable(),
                TextColumn::make('body')->label('Body')->wrap(),
            ]);
    }
}