<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aprendible - {{ $title ?? '' }} </title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
  
    <x-layouts.navigation />

    @if (session('status')) {{-- identificamos el mensage de success --}}
        <div class="status">
             {{ session('status') }} {{-- mensage que se devuelve al crear un post --}}
        </div>
    @endif

    {{-- contenido de cada pagina --}}
    <div class="container">
        {{ $slot }}
    </div>
    

    {{-- <script src="/js/app.js"></script> --}}

</body>
</html>