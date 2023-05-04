<x-layouts.app 
title="Crear nuevo post" 
meta-description="formulario para crear un nuevo blog post">

<h1>Create New Post</h1>

{{-- si existen errores mostramos errore --}}
{{-- @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach --}}

<form action="{{ route('posts.store') }}" method="POST">
    @csrf {{-- envias con seguridad el formulario  SIEMPRE--}}
    @include('posts.form-fields')
    <button class="button" type="submit">Enviar</button>
    <br>
</form>

<br>

<a class="back" href="{{ route('posts.index') }}">Back</a>

</x-layouts.app>