<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\{WithoutUrlPagination, WithPagination};
use Masmerise\Toaster\Toastable;

#[Title('Categories')]
class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    use Toastable;


    protected $listeners = [
        'reload' => '$refresh'
    ];
    public $search;

    public function tooglePublished(Post $post)
    {
        $post->published = !$post->published;
        $post->save();
        if ($post->published) {
            $this->success('Post berhasil diterbitkan');
        } else {
            $this->info('Post tidak diterbitkan');
        }
    }

    public function render()
    {
        $posts = Post::query()
            ->with(['category', 'user'])
            ->search($this->search)
            ->latest()
            ->paginate(10);

        return view('livewire.post.index', ['posts' => $posts]);
    }
}
