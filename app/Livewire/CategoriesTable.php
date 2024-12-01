<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CategoriesTable extends Component
{
    public Collection $categories;

    public string $search;


    public function mount()
    {
        $this->search = '';
        $this->categories = Category::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function search()
    {
        $this->categories = Category::withEventCount()->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc')->get();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetCategories();
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        $this->resetCategories();

    }

    public function resetCategories()
    {
        $this->categories = Category::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function render()
    {


        if (strlen($this->search > 0)) {
            $this->categories = Category::withEventCount()->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc')->get();
        }


        return view('livewire.categories-table');
    }
}
