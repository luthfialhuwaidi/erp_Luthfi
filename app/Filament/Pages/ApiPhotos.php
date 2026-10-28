<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Http;

class ApiPhotos extends Page
{
    protected string $view = 'filament.pages.api-photos';

    protected static ?string $title = 'Galeri Foto';

    protected static BackedEnum|String|null $navigationIcon =
    Heroicon::Photo;

    public function photos()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos',);

        return $response->json();
    }
}
