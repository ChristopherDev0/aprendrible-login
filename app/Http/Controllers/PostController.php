<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /* autentificaion */
    public function __construct()
    {
        /* todos los metodos protegidos exepto */
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::get(); /* nos conectos a la tabla de la base de datos y obtenermos los resultados */
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]); /* pasamos la variable post */
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post()]);
    }

    public function store(SavePostRequest $request)
    {

        /* validamos */
        //$validated = $request->validate([
        //    'title' => ['required'], /* el campo title es el name del fomulario */
        //    'body' => ['required', 'min:5', 'max:20']
        //]);


       // $post = new Post(); /* inyectamos en la db */
       // $post->title = $request->input('title');
       // $post->body = $request->input('body'); /* entramos a los campos enviados por el formulario: name */
       // $post->save(); /* guardamos en db */

       Post::create($request->validated());

        /* nombre con el que se guardara el mensaje de exito, y el segundo parametro el mensage */
        //session()->flash('status', 'Post created!');
        
        /* redireccionamos despues de enviar */
        /* return redirect()->route('posts.index'); */
        return to_route('posts.index')->with('status', 'Post created!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post) /* recibimos parametros por la url */
    {
        

        $post->update($request->validated());

        /* nombre con el que se guardara el mensaje de exito, y el segundo parametro el mensage */
        //session()->flash('status', 'Post Update!');
        
        /* redireccionamos despues de enviar */
        /* return redirect()->route('posts.index'); */
        return to_route('posts.show', $post)->with('status', 'Post Updated!' ); /* redireccionamos a la vista post de este post */
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return to_route('posts.index')->with('status', 'Post deleted');
    }

}
