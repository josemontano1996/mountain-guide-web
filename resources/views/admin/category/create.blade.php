<x-layouts.admin-layout
    :links="[ 'Categorías'=> route('admin.category.index'), 'Crear nueva categoría' =>route('admin.category.create')]">
    <form action="{{route('admin.category.store')}}" method="POST" class="w-[500px]">
        @csrf

        <h1 class="text-3xl mb-8">Crear categoría</h1>

        <div class="mb-4">
            <x-ui.label for="name">Nombre</x-ui.label>
            <x-text-input name="name" type='text' required />
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="is_main" class="mb-0">Visible</x-ui.label>
                <div>
                    <input type="radio" name="display" id="display" value="1" checked>
                    <label for="display">Si</label>
                </div>
                <div>
                    <input type="radio" name="display" id="display" value="">
                    <label for="display">No</label>
                </div>
            </div>
            <span class="text-sm italic">(Categoría activa que debe enseñarse al usuario)</span>
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="is_main" class="mb-0">Categoría principal</x-ui.label>
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