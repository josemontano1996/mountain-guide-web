<x-layouts.admin-layout>
    <x-slot name="head">
        @livewireStyles
    </x-slot>

    <div class="flex justify-between items-center gap-12 mb-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Administración de categorias</h3>
            <p class="text-slate-500">{{ $categories->count() }} categorias encontradas.</p>
        </div>
        <div class="mx-3">
            {{-- TODO: añadir la búsqueda con livewire --}}
            <div class="w-full max-w-sm min-w-[200px] relative">
                <x-search-bar placeholder="no implementado" />
            </div>
        </div>
    </div>
    <div class="relative   w-full  text-gray-700 bg-white shadow-md rounded-lg ">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr class="border-b border-slate-300 bg-slate-50">
                    <th class="p-4 font-normal leading-none text-slate-500">Nombre</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Principal</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Nº eventos</th>
                    <th colspan="2" class="primary-btn"><a href="{{ route('category.create') }}">Crear nueva
                            categoría</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <div wire:key='{{$category->id}}'>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="block font-semibold text-slate-800">{{ $category->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $category->is_main ? 'Si' : 'No' }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $category->events->count() }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <x-link href="{{route('category.edit', $category)}}">Edit</x-link>
                        </td>
                        <td class="border-b border-slate-200 py-5 p-4">
                            <form class="text-slate-500" action="{{route('category.destroy', $category)}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                </div>
                @empty
                <p>No existe ninguna categoría.</p>
                @endforelse
            </tbody>
        </table>
    </div>
    @livewireScripts
</x-layouts.admin-layout>
