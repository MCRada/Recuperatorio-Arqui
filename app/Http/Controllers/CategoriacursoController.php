<?php

namespace App\Http\Controllers;

use App\Models\categoriacurso;
use Illuminate\Http\Request;

class CategoriacursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=categoriacurso::latest()->paginate(7);        
        return view('categoria.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datoscategoria = request()->except('_token');
        categoriacurso::insert($datoscategoria);

        return redirect('categoria')->with('mensaje','Categoria agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoriacurso  $categoriacurso
     * @return \Illuminate\Http\Response
     */
    public function show(categoriacurso $categoriacurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoriacurso  $categoriacurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = categoriacurso::FindOrFail($id);
        return view('categoria.edit', compact('categoria')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoriacurso  $categoriacurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datoscategoria = request()->except(['_token','_method']);

        categoriacurso::where('id','=',$id)->update($datoscategoria);

        $categoria = categoriacurso::findOrFail($id);
        return redirect('categoria')->with('mensaje','Categoria modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoriacurso  $categoriacurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoriacurso $categoriacurso)
    {
        //
    }
}
