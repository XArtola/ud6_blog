<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{
    //Para pedir login

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = POST::where('user_id', $user->id)->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::All();
        $btnText = "Crear";
        return view('posts.create', compact('post', 'categories', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'excerpt' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->image = null;
        if (isset($request->img)) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->put($filename, file_get_contents($file));
            $post->image = 'img/posts/' . $filename;
        }
        $post->user_id = Auth::user()->id;
        $post->published_at = now();
        $post->save();

        return redirect()->route('posts.index');
        //return redirect()->route('proyectos.show', ['id' => $request->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = POST::find($id);
        $user = Auth::user();
        //He aplicado el policy aqui porque ya no se aplicaba automanticamente
        if ($user->can('view', $post)) {
            return view('posts.show', compact('post'));          
        } else {
            return back();
        }
        // return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::All();
        $btnText = "Actualizar";
        $user = Auth::user();
        //He aplicado el policy aqui porque ya no se aplicaba automanticamente
        if ($user->can('view', $post)) {
            return view('posts.edit', compact('id', 'post', 'categories', 'btnText'));          
        } else {
            return back();
        }
        //return view('posts.edit', compact('id', 'post', 'categories', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'excerpt' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->image = null;
        if (isset($request->img)) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->put($filename, file_get_contents($file));
            $post->image = 'img/posts/' . $filename;
        };

        $post->user_id = Auth::user()->id;
        $post->update();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        //He aplicado el policy aqui porque ya no se aplicaba automanticamente
        if ($user->can('view', $post)) {
            Post::find($id)->delete();
            return back();        
        } else {
            return back();
        }
        //return back();
    }
}
