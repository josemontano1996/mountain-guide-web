<x-layouts.admin-layout :links="[ 'Categorías'=> route('admin.category.index'), 'Editar categoría' =>route('admin.category.edit', $category)]">

    <form action="{{route('admin.category.update', $category)}}" method="POST" class="w-[500px]">
        @csrf
        @method('PUT')
        <h1 class="text-3xl mb-8">Editar categoría</h1>

        <div class="mb-4">
            <x-ui.label for="name">Nombre</x-ui.label>
            <x-text-input :value="$category->name" name="name" required />
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="is_main" class="mb-0">Visible</x-ui.label>
                <div>
                    <input type="radio" name="display" id="display" value="1" @if($category->display) checked
                    @endif>
                    <label for="display">Si</label>
                </div>
                <div>
                    <input type="radio" name="display" id="display" value="" @if(!$category->display) checked
                    @endif>
                    <label for="display">No</label>
                </div>
            </div>
            <span class="text-sm italic">(Categoría activa que debe enseñarse al usuario)</span>
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="is_main" class="mb-0">Categoría principal</x-ui.label>
                <div>
                    <input type="radio" name="is_main" id="is_main" value="1" @if($category->is_main) checked
                    @endif>
                    <label for="is_main">Si</label>
                </div>
                <div>
                    <input type="radio" name="is_main" id="is_main" value="" @if(!$category->is_main) checked
                    @endif>
                    <label for="is_main">No</label>
                </div>
            </div>
            <span class="text-sm italic">(Aparecera barra de navegacion principal)</span>
        </div>
        <button class="primary-btn">Guardar</button>
    </form>
</x-layouts.admin-layout>
