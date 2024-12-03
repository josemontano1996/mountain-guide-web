<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CategoriesTable extends Component
{
    public Collection $categories;

    public bool $hasSearched;

    public string $search;


    public function mount()
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->categories = Category::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function search()
    {
        $this->hasSearched = true;
        $this->categories = Category::withEventCount()->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc')->get();
    }

    public function clearSearch()
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->resetCategories();
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        if ($this->search) {
            $this->search();
        } else {
            $this->resetCategories();
        }

    }

    public function resetCategories()
    {
        $this->categories = Category::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function render()
    {

        if (strlen($this->search) > 0) {
            $this->search();
        }

        if (strlen($this->search) < 1 && $this->hasSearched) {
            $this->resetCategories();
        }

        return view('livewire.categories-table');
    }
}
