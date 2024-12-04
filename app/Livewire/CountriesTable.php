<?php

namespace App\Livewire;

use App\Models\Country;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class CountriesTable extends Component
{

    public Collection $countries;

    public bool $hasSearched;
    public string $search;

    public function mount(Collection $countries)
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->countries = $countries;
    }

    public function search()
    {
        $this->hasSearched = true;
        $this->countries = Country::withEventCount()->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc')->get();
    }

    public function clearSearch()
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
        try {
            $country->deleteOrFail();

            if ($this->search) {
                $this->search();
            } else {
                $this->resetCountries();
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.region.index')->with('error', 'La instancia ya fue eliminada.');

        } catch (Exception $e) {
            return redirect()->route('admin.region.index')->with('error', 'Ha ocurrido un error inesperado.');
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
