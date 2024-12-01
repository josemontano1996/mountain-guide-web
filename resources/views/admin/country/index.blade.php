<x-layouts.admin-layout>
    <div class="flex justify-between items-center gap-12 mb-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Administración de países</h3>
            <p class="text-slate-500">{{ $countries->count() }} países encontrados.</p>
        </div>
        <div class="mx-3">
            {{-- TODO: añadir la búsqueda con livewire --}}
            <div class="w-full max-w-sm min-w-[200px] relative">
                <x-search-bar placeholder="no implementado" />
            </div>
        </div>
    </div>
    <div class="relative w-full  text-gray-700 bg-white shadow-md rounded-lg ">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr class="border-b border-slate-300 bg-slate-50">
                    <th class="p-4 font-normal leading-none text-slate-500">Nombre</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Visible</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Nº eventos</th>
                    <th colspan="2" class="primary-btn"><a href="{{ route('admin.category.create') }}">Crear nueva
                            categoría</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($countries as $country)
                <div wire:key='{{$country->id}}'>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="block font-semibold text-slate-800">{{ $country->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $country->display ? 'Si' : 'No' }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $country->events_count}}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <x-link href="{{route('admin.country.edit', $country)}}">Edit</x-link>
                        </td>
                        <td class="border-b border-slate-200 py-5 p-4">
                            <form class="text-slate-500" action="{{route('admin.country.destroy', $country)}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                </div>
                @empty
                <p>No existe ningun país.</p>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>