<?php

namespace App\Http\Controllers;

use App\Models\facurso;
use App\Models\categoriacurso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FacursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscaCodigo(Request $request){
        if ($request->ajax()) {
    		$materiap=facurso::where('Cod_curso',$request->codigoc)->first();
    		if ($materiap) {
    			return response()->json($materiap);
    		}else{
                 return response()->json('FALSE');
    		}
    	}
    }

    public function index()
    {
        $curso=facurso::latest()->paginate(7);        
        return view('cursos.index',compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['tipocategoria']=categoriacurso::all();
        return view('cursos.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Duracion'=>'required|string|max:100',
            'Costo'=>'required|string|max:10000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $curso=new facurso;

        $curso->Nombre=$request->Nombre;
        $curso->Duracion=$request->Duracion;
        $curso->Costo=$request->Costo;
        $curso->id_categoria =$request->id_categoria;
        $curso->Cod_curso = strtoupper(uniqid());

        // if($request->hasFile('Foto')){            
        //     $path = $request->file('Foto')->store('uploads','public');
        //     $curso->Foto = $path;
        // }

        $curso->save();

        return redirect('curso')->with('mensaje','Curso agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facurso  $facurso
     * @return \Illuminate\Http\Response
     */
    public function show(facurso $facurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facurso  $facurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = facurso::FindOrFail($id);
        $tipocategoria['tipocategoria'] = categoriacurso::all();

        return view('cursos.edit',compact('curso'),$tipocategoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facurso  $facurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Duracion'=>'required|string|max:100',
            'Costo'=>'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datos = request()->except(['_token','_method']);

        facurso::where('id','=',$id)->update($datos);

        // $cliente = tipo_materia_prima::findOrFail($id);
        // return view('Cliente.edit',compact('cliente'));
        return redirect('curso')->with('mensaje','Curso Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facurso  $facurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(facurso $facurso)
    {
        //
    }
}
