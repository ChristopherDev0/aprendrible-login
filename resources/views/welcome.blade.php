<x-layouts.app 
title="Home" 
meta-description="Home meta descripcion">

    <h1>Home</h1>

    @auth
        <div class="user-home"><span>Authenticated User:</span>  {{ Auth::user()->name }} </div>
        <div class="user-home"><span>E-mail User:</span>  {{ Auth::user()->email }} </div>
        @endauth

</x-layouts.app>