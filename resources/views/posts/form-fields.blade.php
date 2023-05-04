
<label for="">
    Title 
    <input type="text" name="title" value="{{ old('title', $post->title) }}" >{{-- required --}}
    
    @error('title') {{-- solo si exite un error en el campo title --}}  
        <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
    @enderror

</label> 
<label for="">
    Body 
    <textarea name="body" id="" cols="30" rows="10">{{old('body', $post->body)}}</textarea>
    
    @error('body') {{-- solo si exite un error en el campo title --}}  
        <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
    @enderror
</label> 