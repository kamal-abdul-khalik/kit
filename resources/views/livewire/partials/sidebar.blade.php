<ul class="z-50 w-64 min-h-full p-4 space-y-1 border-r menu bg-base-100 text-base-content border-base-300">
    <x-user />
    <li>
        <a href="{{ route('home') }}" wire:navigate @class(['active' => Route::is('home')])>
            <x-tabler-dashboard class="size-5" />
            Home
        </a>
    </li>
    <li>
        <details class="space-y-1" @if (Route::is(['posts.*', 'categories.*'])) open @endif>
            <summary>
                <x-tabler-category class="size-5" />
                Data Master
            </summary>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('posts.index') }}" wire:navigate @class(['active' => Route::is('posts.*')])>Blog</a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" wire:navigate @class(['active' => Route::is('categories.index')])>Kategori
                        Blog</a>
                </li>
            </ul>
        </details>
    </li>

    <li>
        <a href="{{ route('profile') }}" wire:navigate @class(['active' => Route::is('profile')])>
            <x-tabler-user-edit class="size-5" />
            Edit Profil
        </a>
    </li>
</ul>
