<x-layouts.admin-layout :links="['Administración de países'=>route('admin.country.index'), 'Editar país'=>'#']">

    <form action="{{route('admin.country.update', $country)}}" method="POST" class="w-[500px]">
        @csrf
        @method('PUT')
        <h1 class="text-3xl mb-8">Editar categoría</h1>

        <div class="mb-4">
            <x-ui.label for="name">Nombre</x-ui.label>
            <x-ui.text-input :value="$country->name" name="name" required />
        </div>
        <div class="mb-4">
            <div class="flex space-x-4">
                <x-ui.label for="is_main" class="mb-0">Visible</x-ui.label>
                <div>
                    <input type="radio" name="display" id="display_true" value="1" @if($country->display) checked
                    @endif>
                    <label for="display_true">Si</label>
                </div>
                <div>
                    <input type="radio" name="display" id="display_false" value="" @if(!$country->display) checked
                    @endif>
                    <label for="display_false">No</label>
                </div>
            </div>
            <span class="text-sm italic">(Categoría activa que debe enseñarse al usuario)</span>
        </div>

        <button class="primary-btn">Editar</button>
    </form>
</x-layouts.admin-layout>