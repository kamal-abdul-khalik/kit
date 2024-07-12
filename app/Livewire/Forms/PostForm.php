<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public $category_id;
    public $teaser;
    public $title;
    public $slug;
    public $body;
    public $image;
    public $published;
    public ?Post $post;

    public function setPost(Post $post): void
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->teaser = $post->teaser;
        $this->category_id = $post->category_id;
        $this->body = $post->body;
        $this->published = $post->published;
    }

    public function store(): void
    {
        $data = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'teaser' => 'required|string|max:150',
            'title' => 'required|unique:posts,title,NULL,id',
            'body' => 'required',
            'image' => 'nullable|max:2048',
        ]);
        $data['slug'] = str()->slug($this->title);
        auth()->user()->posts()->create($data);
        $this->reset();
    }

    public function update(): void
    {
        $data = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'teaser' => 'required|string|max:150',
            'title' => 'required|unique:posts,title,' . $this->post->id . ',id',
            'body' => 'required|string',
            'image' => 'nullable|max:2048',
        ]);

        $data['slug'] = str()->slug($this->title);
        if ($this->image) {
            $imageExist = $this->post->image ? Storage::disk('public')->exists($this->post->image) : false;
            if ($imageExist) {
                Storage::disk('public')->delete($this->post->image);
            }
            $data['image'] = $this->image;
        }

        $this->post->update($data); // Corrected line
        $this->reset();
    }
}
