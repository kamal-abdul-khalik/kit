<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

class Actions extends Component
{
    use WithFileUploads;
    use Toastable;

    public $image;
    public PostForm $form;
    public ?Post $post;

    public function mount()
    {
        if (isset($this->post)) {
            $this->form->setPost($this->post);
            $this->image = $this->post->img;
        }
    }

    public function save(): void
    {
        if ($this->image) {
            $this->form->image = $this->image->hashName('post');
            $this->image->store('post');
        }

        if (isset($this->form->post)) {
            $this->form->update();
            $this->redirect(route('posts.index', true));
            $this->success('Blog berhasil diupdate.');
        } else {
            $this->form->store();
            $this->redirect(route('posts.index', true));
            $this->success('Blog berhasil disimpan.');
        }
        $this->dispatch('reload');
    }

    #[On('deletePost')]
    public function deletePost(Post $post): void
    {
        $post->delete();
        $this->dispatch('reload');
        $this->warning('Post masuk ke tempat sampah.');
    }

    public function render()
    {
        $categories = Category::get();
        return view('livewire.post.actions', ['categories' => $categories]);
    }
}
