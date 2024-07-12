<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Categories')]
class Index extends Component
{
    use WithPagination;

    public $search;
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function render()
    {
        $categories = Category::query()
            ->paginate(10);
        return view('livewire.category.index', [
            'categories' => $categories
        ]);
    }
}
