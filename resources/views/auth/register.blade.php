<x-layouts.app 
title="Register" 
meta-description="Register meta descripcion">

    <h1>Register</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf {{-- envias con seguridad el formulario  SIEMPRE--}}
    
        <label for="">
            Name 
            <input 
            autofocus="autofocus"
            type="text" 
            name="name" 
            value="{{ old('name') }}" >{{-- required --}}
            
            @error('name') {{-- solo si exite un error en el campo title --}}  
                <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
            @enderror
        </label> 

        <label for="">
            E-mail 
            <input 
            type="email" 
            name="email" 
            value="{{ old('email') }}" >{{-- required --}}
            
            @error('email') {{-- solo si exite un error en el campo title --}}  
                <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
            @enderror
        </label> 

        <label for="">
            Password 
            <input 
            type="password" 
            name="password" >
            
            @error('password') {{-- solo si exite un error en el campo title --}}  
                <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
            @enderror
        </label> 

        <label for="">
            Password Confirmation
            <input 
            type="password" 
            name="password_confirmation" >
            
            @error('password_confirmation') {{-- solo si exite un error en el campo title --}}  
                <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
            @enderror
        </label> 
        <br>
       
       <a class="back" href="{{ route('login') }}">Login</a>

       <button class="button" type="submit">Register</button>
        <br>
    </form>

</x-layouts.app>