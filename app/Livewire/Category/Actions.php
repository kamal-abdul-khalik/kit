<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Attributes\{On};
use Livewire\Component;
use Masmerise\Toaster\Toastable;

class Actions extends Component
{
    use Toastable;

    public $showModal = false;
    public CategoryForm $form;

    #[On('createCategory')]
    public function createCategory(): void
    {
        $this->showModal = true;
    }

    public function save()
    {
        if (isset($this->form->category)) {
            $this->form->update();
            $this->success('Category update successfully');
        } else {
            $this->form->store();
            $this->success('Category saved successfully');
        }
        $this->closeModal();
        $this->dispatch('reload');
    }

    #[On('editCategory')]
    public function editCategory(Category $category): void
    {
        $this->form->setCategory($category);
        $this->showModal = true;
    }

    #[On('deleteCategory')]
    public function deleteCategory(Category $category): void
    {
        $category->delete();
        $this->dispatch('reload');
        $this->success('Category deleted successfully');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->form->resetValidation();
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.category.actions');
    }
}
