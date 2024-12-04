<x-layouts.admin-layout :links="['Administración de regiones'=>'#']">
    @livewire('region-table', ['regions'=>$regions])
</x-layouts.admin-layout>
