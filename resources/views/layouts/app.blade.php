<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- Cropper.js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/y2ftlfjmbel70u9jkkkqt28ohxcprtq5bg4bwymi7n76w68d/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    </head>

    <body class="min-h-screen bg-base-200">
        @auth
            <div class="drawer lg:drawer-open">
                <input id="sidebar-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partials.navbar')
                    <x-banner />
                    {{ $slot }}
                    {{-- @if (!Route::is('transaction.create'))
                        <a href="{{ route('transaction.create') }}" wire:navigate type="button"
                            class="fixed z-50 btn btn-circle print:hidden btn-primary bottom-4 right-4">
                            <x-tabler-cash-register class="size-6" />
                        </a>
                    @endif --}}
                </div>
                <div class="drawer-side">
                    <label for="sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partials.sidebar')
                </div>
            </div>
        @endauth

        @guest
            <div class="flex flex-col items-center justify-center h-screen gap-8 print:hidden">
                <x-logo />
                <h1 class="text-4xl font-bold">{{ config('app.name') }}</h1>
                {{ $slot }}
            </div>
        @endguest
        <x-toaster-hub />
    </body>

</html>
