<x-layouts.app 
title="Blog" 
meta-description="Blog meta descripcion">

        <h1>Blog</h1>

        @auth {{-- solo para ususarios autenticados --}}
             <a href="{{ route('posts.create') }}" class="create-post">Create New post</a>
        @endauth

        <div class="all-posts">
            @foreach ($posts as $post)
            <div class="post-content">
                <h2>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h2>

                @auth
                <div class="post-actions">
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a> {{-- manda el id --}}
            
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
                @endauth
                
            </div>
            @endforeach
        </div>

</x-layouts.app>
