<div class="page-wrapper">
    <form class="card" wire:submit="save">
        <div class="card-body">
            <div class="py-4 space-y-4">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mx-4">
                        <x-file wire:model="image" accept="image/png, image/jpeg, image/jpg" crop-after-change>
                            <div class="avatar">
                                <div class="w-28 md:w-40 xl:w-60 mask mask-squircle">
                                    <img src="{{ $image ?? '/null-image.png' }}" />
                                </div>
                            </div>
                        </x-file>
                    </div>
                    <div class="w-full mx-4 space-y-4">
                        <x-input wire:model.lazy="form.title" label="Judul Blog" />
                        <x-input wire:model="form.teaser" label="Deskripsi awal"
                            placeholder="Tuliskan deskripsi singkat, tidak lebih 150 karakter" />
                        <x-choices class="input-primary" label="Kategori Blog" wire:model="form.category_id"
                            :options="$categories" single />
                    </div>
                </div>
                <x-editor wire:model="form.body" label="Isi Blog" hint="Tuliskan ide terbaik anda" />
            </div>
            <div class="flex justify-between modal-actions">
                <a type="button" class="btn btn-ghost" href="{{ route('posts.index') }}" wire:navigate>
                    <x-tabler-arrow-left class="size-4" />
                    <span>Back</span>
                </a>
                <x-button label="Simpan" class="btn-primary" wire:click="save" icon="o-check" spinner />
            </div>
        </div>
    </form>
</div>
