<div>
    <div class="flex justify-between items-center gap-12 mb-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Administración de regiones</h3>
            <p class="text-slate-500">{{ $regions->count() }} regiones encontradas.</p>
        </div>

        {{-- Searchbar --}}
        <div class="mx-3">
            {{-- TODO: añadir la búsqueda con livewire --}}
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <form role="search">
                        <input
                            class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                            placeholder="Buscar región" wire:model.live='search' wire:keydown.debounce.300ms="search" />
                    </form>
                    <button class="absolute top-1/2 transform -translate-y-1/2 right-1" wire:click='clearSearch'>
                        <x-ui.close-svg />
                    </button>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full  text-gray-700 bg-white shadow-md rounded-lg ">
        <table class="w-full text-left table-auto min-w-max ">
            <thead>
                <tr class="border-b border-slate-300 bg-slate-50">
                    <th class="p-4 font-normal leading-none text-slate-500">Nombre</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Visible</th>
                    <th class="p-4 font-normal leading-none text-slate-500">Nº eventos</th>
                    <th colspan="2" class="primary-btn"><a href="{{ route('admin.country.create') }}">Crear nueva
                            región</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($regions as $region)
                <div wire:key="{{$region->id}}">
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="block font-semibold text-slate-800">{{ $region->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $region->display ? 'Si' : 'No' }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $region->events_count}}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <x-link href="{{route('admin.region.edit', $region)}}">Editar</x-link>
                        </td>
                        <td class="border-b border-slate-200 py-5 p-4">
                            <button wire:click="deleteRegion({{$region}})" wire:loading.attr='disabled'
                                wire:target="deleteRegion">Eliminar</button>
                        </td>
                    </tr>
                </div>
                @empty
                <p>No existe ninguna region.</p>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
