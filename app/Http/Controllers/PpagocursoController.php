<?php

namespace App\Http\Controllers;

use App\Models\ppagocurso;
use App\Models\pagocurso;
use App\Models\adquirircurso;

use Illuminate\Http\Request;

class PpagocursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ppagocurso  $ppagocurso
     * @return \Illuminate\Http\Response
     */
    public function show(ppagocurso $ppagocurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ppagocurso  $ppagocurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagocurso = pagocurso::FindOrFail($id);
        return view('ppagocurso.edit', compact('pagocurso')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ppagocurso  $ppagocurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datospago = request()->except(['_token','_method']);

        pagocurso::where('id','=',$id)->update($datospago);

        $pagocurso = pagocurso::findOrFail($id);

        adquirircurso::where('id','=',$request->id_adquirircurso)->update([
            'estado_adquirircurso'=>'Si'
        ]);

        return redirect('pagocurso')->with('mensaje','Pago modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ppagocurso  $ppagocurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(ppagocurso $ppagocurso)
    {
        //
    }
}
