<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Form;

class CategoryForm extends Form
{
    public $name;
    public ?Category $category;

    public function setCategory(Category $category): void
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function store(): void
    {
        $data = $this->validate([
            'name' => 'required|unique:categories,name,NULL,id',
        ]);
        $data['slug'] = str()->slug($this->name);
        Category::create($data);
        $this->reset();
    }
    public function update(): void
    {
        $data = $this->validate([
            'name' => 'required|unique:categories,name,' . $this->category->id . ',id',
        ]);
        $this->category->update($data);
        $this->reset();
    }
}
