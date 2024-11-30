<x-layouts.admin-layout>
    <form action="{{route('category.store')}}" method="POST" class="w-[500px]">
        @csrf

        <h1 class="text-3xl mb-8">Editar categoría</h1>

        <div class="mb-4">
            <x-label for="name">Nombre</x-label>
            <x-text-input name="name" required />
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-label for="is_main" class="mb-0">Categoría principal</x-label>
                <div>
                    <input type="radio" name="is_main" id="is_main" value="1">
                    <label for="is_main">Si</label>
                </div>
                <div>
                    <input type="radio" name="is_main" id="is_main" value="" checked>
                    <label for="is_main">No</label>
                </div>
            </div>
            <span class="text-sm italic">(Aparecera barra de navegacion principal)</span>
        </div>
        <button class="primary-btn">Guardar</button>
    </form>
</x-layouts.admin-layout>
