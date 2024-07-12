<div class="page-wrapper">
    <div class="flex flex-col justify-between gap-2 md:flex-row">
        <label class="flex items-center gap-2 input input-bordered">
            <input type="search" class="grow" placeholder="Search" wire:model.live.debounce.600ms="search" />
            <x-tabler-search class="opacity-50 size-4" />
        </label>
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary" wire:navigate>
            <x-tabler-plus class="size-4" />
            <span>Blog</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sampul</th>
                    <th>Penulis</th>
                    <th class="text-center">Publish?</th>
                    <th class="text-center">Di lihat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="text-xs" wire:key="post-{{ $post->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="w-10 rounded-lg">
                                        <img src="{{ $post->img }}" alt="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-xs font-semibold">{{ $post->title }}</div>
                                    <div class="text-xs">{{ $post->category->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td class="text-center">
                            @can('publish posts')
                                <input type="checkbox" class="toggle toggle-xs" @checked($post->published)
                                    wire:change="tooglePublished({{ $post->id }})" />
                            @endcan
                        </td>
                        <td class="text-center ">{{ $post->views }}</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                @can('edit posts')
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-xs btn-square" wire:navigate>
                                        <x-tabler-edit class="size-4" />
                                    </a>
                                @endcan
                                @can('delete posts')
                                    <button class="btn btn-xs text-error btn-square"
                                        wire:click="$dispatch('deletePost', {post: {{ $post->id }}})">
                                        <x-tabler-trash class="size-4" />
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan='6' class="font-semibold text-center text-slate-500/70">Belum ada post disini
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>{{ $posts->links(data: ['scrollTo' => false]) }}</div>
    @livewire('post.actions')
</div>
