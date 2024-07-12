<div class="page-wrapper">
    <x-alert wire:offline title="Oops"
        description="Spertinya Anda sedang offline, Silahkan periksa koneksi internet Anda" class="alert-warning" />

    <div class="max-w-lg mx-auto card">
        <form wire:submit="save" class="card-body">
            <h3 class="card-title">Edit Profile: {{ auth()->user()->name }}</h3>
            <div class="py-4 space-y-2">
                <x-input label="Nama Lengkap" wire:model="name" inline />
                <x-input label="Email" wire:model="email" inline />
                <x-input type="password" label="Password" wire:model="password"
                    placeholder="Isi jika ingin mengubah password" />
            </div>
            <div class="justify-end card-actions">
                <x-button type="submit" class="btn-primary btn-sm" spinner="save">
                    <x-tabler-check class="size-5" wire:loading.attr="hidden" />
                    <span>Simpan</span>
                </x-button>
            </div>
        </form>
    </div>
</div>
