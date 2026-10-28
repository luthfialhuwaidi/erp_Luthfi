<x-filament-panels::page>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
        style="display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr)); 
        gap: 1.5rem;">
        @forelse (array_slice($this->photos()?? [],0,50) as $photo)
            <div style="display:flex;flex-direction:column; width: 100%;">
                <div>
                    <img src="{{ $photo['url'] }}" alt="{{ $photo['title'] }}" loading="lazy" class="" />
                </div>
                <h3 class="mt-2.5 truncate text-base font-bold
                capitalize text-gray-900 dart:text-white"
                    style="margin-top: 10px; font-size:0.95rem;
                font-wight:700; text-transform;capitalize;
                white-space:nowrap; overflow:hidden; 
                text-overflow:ellipsis;">
                    {{ $photo['title'] }}
                </h3>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align:center; padding:3rem;">
                <p class="text-sm text-gray-500">Gagal memuat foto dari API.</p>
            </div>
        @endforelse
    </div>
</x-filament-panels::page>
