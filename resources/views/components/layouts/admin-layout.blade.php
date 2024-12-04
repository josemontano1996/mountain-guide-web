<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Admin'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Loading livewire because the prefetch links in nav bar need it --}}
    @livewireStyles
    @isset($head)
    {{$head}}
    @endisset
</head>


<body class="flex">
    <header class="bg-indigo-500 h-screen w-1/5 p-4 text-gray-100 flex flex-col justify-between sticky top-0 left-0">
        <div>
            <h1 class="text-2xl mb-5">Mountain Guide</h1>
            <h2 class="text-xl mb-4">Administración</h2>
            <nav>
                <ul class="flex flex-col space-y-2">
                    <li>
                        <x-link href="{{route('admin.category.index')}}">Categorias</x-link>
                    </li>
                    <li>
                        <x-link href="{{route('admin.country.index')}}">Países</x-link>
                    </li>
                    <li>
                        <x-link href="{{route('admin.region.index')}}">Regiones</x-link>
                    </li>
                    <li>
                        <x-link href="{{route('admin.event.index')}}">Excursiones</x-link>
                    </li>
                    <li>
                        <x-link href="#">Información personal</x-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div>Perfil</div>
    </header>

    <main class="w-full mt-12 max-w-[720px] mx-auto">
        @if (session("success"))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session("success") }}</p>
        </div>
        @elseif (session("error"))
        <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!</p>
            <p>{{ session("error") }}</p>
        </div>
        @endif
        <x-ui.breadcrumps :links="$links" class="mb-6" />
        {{$slot}}
        @livewireScripts
    </main>
</body>

</html>
