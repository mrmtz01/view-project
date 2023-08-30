<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        //return para vistas en blade
        return view('components.list',['articles' => $articles]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //metodo que se encarga de crear una nueva vista
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $article = Article::create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $article = Article::findOrFail($id);
        return view('components.update',['data' => $article]);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->update(['status' => 'active']);
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //eliminar un dato
        //Article::destroy($id);
        //return redirect('articles');
        //actualizar un dato
        $article = Article::findOrFail($id);
        $article->status = 'inactive';
        $article->save();
        return redirect('articles');
    }
}
