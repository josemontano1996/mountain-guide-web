<x-layouts.admin-layout :links="['Administración de países'=>route('admin.country.index'), 'Crear país'=>'#']">
    <form action="{{route('admin.country.store')}}" method="POST" class="w-[500px]">
        @csrf
        <h1 class="text-2xl mb-8">Crear nuevo país</h1>
        <div class="mb-4">
            <x-ui.label for="name">Nombre</x-ui.label>
            <x-ui.text-input name="name" text="text" required />
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
                <x-ui.form-error name='display' />
            </div>
            <span class="text-sm italic">(País activo que debe enseñarse al usuario)</span>
        </div>
        <button class="primary-btn">Guardar</button>
    </form>
</x-layouts.admin-layout>