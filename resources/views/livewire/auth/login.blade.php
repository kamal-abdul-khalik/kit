<div class="w-full max-w-sm shadow-2xl card bg-base-100 shrink-0">
    <form wire:submit="login" class="card-body" novalidate>
        <h3 class="text-xl font-bold">Selamat Datang</h3>
        <div class="space-y-4 form-control">
            <x-input type="email" wire:model.lazy="email" placeholder="email" label="Email" inline />
            <x-input type="password" wire:model.lazy="password" placeholder="password" label="Password" inline />
        </div>
        <div class="mt-6 form-control">
            <x-button class="btn-primary" type="submit">
                <x-tabler-login class="size-5" />
                <span>Login</span>
            </x-button>
        </div>
    </form>
</div>
