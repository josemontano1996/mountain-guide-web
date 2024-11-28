<x-layouts.layout>
    <x-slot name="head">
        @livewireStyles
    </x-slot>

    <div class="max-w-[720px] mx-auto">
        <div class="w-full flex justify-between items-center gap-12 mb-3">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Administración de categorias</h3>
                <p class="text-slate-500">{{ $categories->count() }} categorias encontradas.</p>
            </div>
            <div class="mx-3">
                {{-- TODO: anadir la busqueda con livewire --}}
                <div class="w-full max-w-sm min-w-[200px] relative">
                    <x-search-bar placeholder="no implementado" />
                </div>
            </div>
        </div>

        <div class="relative flex flex-col w-full h-full  text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr class="border-b border-slate-300 bg-slate-50">
                        <th class="p-4 font-normal leading-none text-slate-500">Nombre</th>
                        <th class="p-4 font-normal leading-none text-slate-500">Principal</th>

                        <th class="p-4 font-normal leading-none text-slate-500">Nº eventos</th>
                        <th colspan="2" class="primary-btn"><a href="{{ route('category.create') }}">Crear nueva
                                categoria</a></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr class="hover:bg-slate-50" x-data="{ open: false }">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="block font-semibold text-slate-800" x-data="{ open: false }">
                                {{ $category->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $category->is_main ? 'Si' : 'No' }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-slate-500">{{ $category->events->count() }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <button class="text-slate-500" @click="open = true">
                                Editar
                                </a>
                            </button>
                        </td>
                        <td class="border-b border-slate-200 py-5 p-4">
                            <form class="text-slate-500"><button>Eliminar</button></form>
                            <div x-show="open"
                                class="fixed  left-0 w-screen h-screen bg-slate-200/50 top-0 flex flex-col items-center justify-center">
                                <div class="py-4 px-8 bg-white rounded absolute" @click.outside="open = false">
                                    <button @click="open = false">
                                        <x-close-svg />
                                    </button>
                                    <form action="" class="flex flex-col space-y-6">
                                        <h4 class="text-2xl font-semibold">Editar categoria</h4>
                                        <div class="flex items-center space-x-4">
                                            <labelfor="name">Nombre</label>
                                                <input type="text" name="name" value="{{ $category->name }}"
                                                    class="border-gray-400 rounded">
                                        </div>
                                        <div class="flex items-center space-x-6">
                                            <label for="is_main" class="font-semibold">Categoría destacada</label>
                                            <input type="checkbox" @if ($category->is_main) checked="true" @else
                                            checked="false" @endif>
                                        </div>
                                        <button class="primary-btn">Editar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p>No existe ninguna categoria.</p>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </x-layout>