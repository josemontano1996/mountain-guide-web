<x-layouts.admin-layout :links="[ 'Categorías'=> route('admin.category.index'), 'Crear nueva categoría' =>'#']">
    <form action="{{route('admin.category.store')}}" method="POST" class="w-[500px]">
        @csrf

        <h1 class="text-3xl mb-8">Crear categoría</h1>

        <div class="mb-4">
            <x-ui.label for="name">Nombre</x-ui.label>
            <x-ui.text-input name="name" type='text' required />
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="display" class="mb-0">Visible</x-ui.label>
                <div>
                    <input type="radio" name="display" id="display_true" value="1" checked>
                    <label for="display_true">Si</label>
                </div>
                <div>
                    <input type="radio" name="display" id="display_false" value="">
                    <label for="display_false">No</label>
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
            <span class="text-sm italic">(Aparecerá barra de navegacion principal)</span>
        </div>
        <button class="primary-btn">Guardar</button>
    </form>
</x-layouts.admin-layout>