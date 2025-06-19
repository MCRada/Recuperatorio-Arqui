<?php

namespace App\Http\Controllers;

use App\Models\pagocurso;
use App\Models\adquirircurso;

use Illuminate\Http\Request;

class PagocursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pagocurso = pagocurso::select('pagocursos.id', 'facursos.Nombre as nombrecurso', 'pagocursos.fecha', 'pagocursos.monto', 'pagocursos.estado_pagocurso')
        ->from('pagocursos')
        ->join('adquirircursos','adquirircursos.id','=','pagocursos.id_adquirircurso')
        ->join('facursos','adquirircursos.id_curso','=','facursos.id')
        ->paginate(7);

        return view('pagocurso.index',compact('pagocurso'));

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
        $pagocurso = request()->except('_token');
        pagocurso::insert($pagocurso);

        return redirect('pagocurso')->with('mensaje','Pago agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pagocurso  $pagocurso
     * @return \Illuminate\Http\Response
     */
    public function show(pagocurso $pagocurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagocurso  $pagocurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagocurso = adquirircurso::FindOrFail($id);
        return view('pagocurso.edit', compact('pagocurso')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagocurso  $pagocurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'estado_pagocurso'=>'required|string|max:100',
            'monto'=>'required|string|max:10000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $curso=new pagocurso;

        $curso->id_adquirircurso =$request->id_adquirircurso;
        $curso->fecha=$request->fecha;
        $curso->estado_pagocurso=$request->estado_pagocurso;
        $curso->monto =$request->monto;
        $curso->save();


        if($request->estado_pagocurso == 'cancelado'){

            adquirircurso::where('id','=',$request->id_adquirircurso)->update([
                'estado_adquirircurso'=>'Si'
            ]);
        }

        
        return redirect('pagocurso')->with('mensaje','Pago agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagocurso  $pagocurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagocurso $pagocurso)
    {
        //
    }
}
