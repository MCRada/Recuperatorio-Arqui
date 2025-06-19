<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function buscaEstudiante(Request $request){
        if ($request->ajax()) {
    		$materiap=estudiante::where('CedulaIdentidad',$request->codigoc)->first();
    		if ($materiap) {
    			return response()->json($materiap);
    		}else{
                 return response()->json('FALSE');
    		}
    	}
    }

    public function index()
    {
        $estudiante=estudiante::latest()->paginate(7);        
        return view('estudiante.index',compact('estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosestudiante = request()->except('_token');
        estudiante::insert($datosestudiante);

        return redirect('estudiante')->with('mensaje','Estudiante agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = estudiante::FindOrFail($id);
        return view('estudiante.edit', compact('estudiante')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:1000',
            'ApellidoPaterno'=>'required|string|max:1000',
            'ApellidoMaterno'=>'required|string|max:1000',
            'CedulaIdentidad'=>'required|string|max:100',
            'TelefonoCel'=>'required|string|max:100',
            'Direccion'=>'required|string|max:2000',
            'Email'=>'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datos = request()->except(['_token','_method']);

        estudiante::where('id','=',$id)->update($datos);

        // $cliente = tipo_materia_prima::findOrFail($id);
        // return view('Cliente.edit',compact('cliente'));
        return redirect('estudiante')->with('mensaje','Estudiante Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiante $estudiante)
    {
        //
    }
}
