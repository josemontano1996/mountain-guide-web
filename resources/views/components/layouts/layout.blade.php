<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Admin'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    <li><a href="{{route('category.index')}}">Categorias</a></li>
                    <li>Países</li>
                    <li>Regiones</li>
                    <li>Excursiones</li>
                    <li>Información personal</li>
                </ul>
            </nav>
        </div>
        <div>Perfil</div>
    </header>

    <main class="w-full mt-12">
        {{$slot}}
    </main>
</body>

</html>
