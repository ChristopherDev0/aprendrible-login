<x-layouts.app 
:title="$post->title" 
:meta-description="$post->body">

<h1 class="title-post">{{ $post->title }}</h1>
<p class="bosy-post">{{ $post->body }}</p>

<a class="back" href="{{ route('posts.index') }}">Back</a>

</x-layouts.app>