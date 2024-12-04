<?php

namespace App\Livewire;

use App\Models\Region;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class RegionTable extends Component
{

    public Collection $regions;

    public bool $hasSearched;

    public string $search;

    public function mount(Collection $regions)
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->countries = $regions;
    }

    public function search()
    {
        $this->hasSearched = true;
        $this->regions = Region::withEventCount()->searchByRow('name', $this->search)->orderBy('name', 'asc')->get();
    }

    public function clearSearch()
    {
        $this->hasSearched = false;
        $this->search = '';
        $this->resetRegions();
    }

    public function resetRegions()
    {
        $this->regions = Region::withEventCount()->orderBy('name')->get();
    }

    public function deleteRegion(Region $region)
    {
        try {
            $region->deleteOrFail();
            
            if ($this->search) {
                $this->search();
            } else {
                $this->resetRegions();
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
            $this->resetRegions();
        }

        return view('livewire.region-table');
    }
}
