<?php

namespace App\Http\Controllers;

use App\Models\adquirircurso;
use App\Models\facurso;
use Carbon\Carbon;
use App\Models\categoriacurso;

use Illuminate\Http\Request;



class AdquirircursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $adquirircurso=adquirircurso::latest()->paginate(7);        


        $adquirircurso = adquirircurso::select('adquirircursos.id', 'facursos.nombre as nombrecurso', 'facursos.Cod_curso', 'estudiantes.nombre as nombreestudiante', 'estudiantes.ApellidoPaterno', 'estudiantes.ApellidoMaterno', 'estudiantes.CedulaIdentidad', 'adquirircursos.fecha', 'adquirircursos.estado_adquirircurso')
                                    ->from('adquirircursos')
                                    ->join('facursos','facursos.id','=','adquirircursos.id_curso')
                                    ->join('estudiantes','estudiantes.id','=','adquirircursos.id_estudiante')
                                    ->paginate(7);

        return view('adquirircurso.index',compact('adquirircurso'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['curso']=facurso::all();
        return view('adquirircurso.create',$datos);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data1 =[];
        if($request->has('id_nombrearea_plan')){
            foreach ($request->get('id_nombrearea_plan') as $id){
                $data1[]=$id;
            }
        }
            
        if($request->has('listamateria')){
            foreach ($request->get('listamateria') as $key => $idm){
                adquirircurso::insert([
                    'id_curso' => $idm,
                    'id_estudiante' => $data1[$key],
                    'fecha' => Carbon::now()->format('Y-m-d'),
                    'estado_adquirircurso' => 'No',
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'updated_at' => Carbon::now()->format('Y-m-d')
                ]);

            }
        }
        
        return redirect('adquirircurso')->with('mensaje','Curso Aquirido agregado con exito');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adquirircurso  $adquirircurso
     * @return \Illuminate\Http\Response
     */
    public function show(adquirircurso $adquirircurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adquirircurso  $adquirircurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $adquirircurso = adquirircurso::FindOrFail($id);

        $adquirircurso = adquirircurso::select('adquirircursos.id as id', 'adquirircursos.id_estudiante', 'facursos.nombre as nombrecurso', 'facursos.Cod_curso', 'estudiantes.nombre as nombreestudiante', 'estudiantes.ApellidoPaterno', 'estudiantes.ApellidoMaterno', 'estudiantes.CedulaIdentidad', 'adquirircursos.fecha', 'adquirircursos.estado_adquirircurso')
                                        ->from('adquirircursos')
                                        ->where('adquirircursos.id',$id)
                                        ->join('facursos','facursos.id','=','adquirircursos.id_curso')
                                        ->join('estudiantes','estudiantes.id','=','adquirircursos.id_estudiante')
                                        ->first();

                                        $curso = facurso::all();


        // return view('adquirircurso.edit',compact('adquirircurso'),$curso);

        return view('adquirircurso.edit')->with('adquirircurso',$adquirircurso)->with('curso',$curso);


    }


    public function eliminacursoadquirido(Request $request){
        $mat=adquirircurso::find($request->id);
        $mat->destroy($request->id);
        return with('mensaje','Curso Adquirido Eliminado con exito');
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adquirircurso  $adquirircurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adquirircurso $adquirircurso)
    {
        
        $data1 = $request->get('id_nombrearea_plan', []);
        $data2 = $request->get('listacurso', []);
        $data3 = $request->get('listamateria', []);
        
        if (count($data1) > 0 && count($data2) > 0 && count($data3) > 0) {
            foreach ($data2 as $key => $idm) {
                adquirircurso::updateOrInsert(
                    [
                        'id' => $idm,
                    ],
                    [
                        'id_estudiante' => $data1[$key],
                        'id_curso' => $data3[$key],
                        'fecha' => Carbon::now()->format('Y-m-d'),
                        'estado_adquirircurso' => 'No',
                        'updated_at' => Carbon::now()->format('Y-m-d'),
                    ]
                );
            }
        }
        

        return redirect('adquirircurso')->with('mensaje','Curso Aquirido mofiiciado con exito');    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adquirircurso  $adquirircurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(adquirircurso $adquirircurso)
    {
        //
    }
}
