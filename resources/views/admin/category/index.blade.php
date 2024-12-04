<x-layouts.admin-layout :links="[ 'Categorías'=>'#']">
    @livewire('categories-table',['categories'=> $categories])
</x-layouts.admin-layout>
