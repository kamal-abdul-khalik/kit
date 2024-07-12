<div>
    <input type="checkbox" class="modal-toggle" @checked($showModal) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="save">
            <h3 class="text-lg font-bold">Form Input Kategori Blog</h3>
            <div class="py-4 space-y-2">
                <x-input wire:model.lazy="form.name" label="Name" />
            </div>
            <div class="flex justify-between modal-actions">
                <button type="button" class="btn btn-ghost btn-sm" wire:click="closeModal">
                    <x-tabler-x class="size-4" />
                    <span>Batal</span>
                </button>
                <button class="btn btn-primary btn-sm">
                    <x-tabler-check class="size-4" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
