<x-layouts.admin-layout :links="['Administración de países'=>route('admin.country.index')]">
    @livewire('countries-table',['countries'=> $countries])
</x-layouts.admin-layout>
