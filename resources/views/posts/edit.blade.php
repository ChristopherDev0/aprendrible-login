<x-layouts.app 
:title="$post->title" 
:meta-description="$post->body">

<h1>Form edit</h1>
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf @method('PATCH') {{-- envias con seguridad el formulario  SIEMPRE y tambien el nombre del metodo a utilizar UPDATE --}}
    @include('posts.form-fields')
    <button class="button" type="submit">Update post</button>
    
</form>



<a class="back" href="{{ route('posts.index') }}">Back</a>

</x-layouts.app>