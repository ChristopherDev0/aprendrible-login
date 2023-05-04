<x-layouts.app 
title="Login" 
meta-description="Login meta descripcion">

    <h1>Login</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf {{-- envias con seguridad el formulario  SIEMPRE--}}
    
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
            name="password" 
            
            @error('password') {{-- solo si exite un error en el campo title --}}  
                <small style="color:rgb(223, 8, 8)">{{ $message }}</small>
            @enderror
        </label> 

        <br>
        
        <label for="">
                Recuerdame
            <input 
            type="checkbox" 
            name="remember" 
            >
            
        </label> 
       
       <a class="back" href="{{ route('register') }}">Register</a>

       <button class="button" type="submit">Login</button>
        <br>
    </form>

</x-layouts.app>