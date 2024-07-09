<?php

namespace App\Livewire\Post;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Categories')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.post.index');
    }
}
