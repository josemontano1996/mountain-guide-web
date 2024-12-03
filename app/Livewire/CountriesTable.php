<?php

namespace App\Livewire;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CountriesTable extends Component
{

    public Collection $countries;

    public bool $hasSearched;
    public string $search;

    public function mount()
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->countries = Country::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function search()
    {
        $this->hasSearched = true;
        $this->countries = Country::withEventCount()->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc')->get();
    }

    public function cleanSearch()
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->resetCountries();
    }

    public function resetCountries()
    {
        $this->countries = Country::withEventCount()->orderBy('name', 'asc')->get();
    }

    public function deleteCountry(Country $country)
    {
        $country->delete();

        if ($this->search) {
            $this->search();
        } else {
            $this->resetCountries();
        }
    }
    public function render()
    {
        if (strlen($this->search) > 0) {
            $this->search();
        }

        if (strlen($this->search) < 1 && $this->hasSearched) {
            $this->resetCountries();
        }

        return view('livewire.countries-table');
    }
}
