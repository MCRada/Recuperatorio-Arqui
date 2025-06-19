<?php

namespace App\Http\Controllers;

use App\Models\reportepago;
use App\Models\pagocurso;
use PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReportePagoMail;

use Illuminate\Http\Request;

class ReportepagoController extends Controller
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
     * @param  \App\Models\reportepago  $reportepago
     * @return \Illuminate\Http\Response
     */
    public function show(reportepago $reportepago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reportepago  $reportepago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagocurso=pagocurso::select('pagocursos.id', 
                                'facursos.Nombre as nombrecurso', 
                                'estudiantes.Nombre as nombreestudiante', 
                                'estudiantes.Nombre as ApellidoPaterno', 
                                'estudiantes.Nombre as ApellidoMaterno', 
                                'pagocursos.fecha', 
                                'pagocursos.monto', 
                                'pagocursos.estado_pagocurso')
                            ->from('pagocursos')
                            ->where('pagocursos.id',$id)
                            ->join('adquirircursos','adquirircursos.id','=','pagocursos.id_adquirircurso')
                            ->join('facursos','adquirircursos.id_curso','=','facursos.id')
                            ->join('estudiantes','adquirircursos.id_estudiante','=','estudiantes.id')
                            ->get();

        $totalMonto = $pagocurso->sum('monto');

        $pdf = PDF::setPaper('LETTER', 'landscape')->loadView('pagocurso.pdfid', [
            'pagocurso' => $pagocurso,
            'totalMonto' => $totalMonto
        ]);

        return $pdf->stream();
    }

    public function pdf()
    {
        
        $pagocurso=pagocurso::select('pagocursos.id', 
        'facursos.Nombre as nombrecurso', 
        'estudiantes.Nombre as nombreestudiante', 
        'estudiantes.Nombre as ApellidoPaterno', 
        'estudiantes.Nombre as ApellidoMaterno', 
        'pagocursos.fecha', 
        'pagocursos.monto', 
        'pagocursos.estado_pagocurso')
            ->from('pagocursos')
            ->join('adquirircursos','adquirircursos.id','=','pagocursos.id_adquirircurso')
            ->join('facursos','adquirircursos.id_curso','=','facursos.id')
            ->join('estudiantes','adquirircursos.id_estudiante','=','estudiantes.id')
            ->orderBy('pagocursos.id', 'asc')
            ->get();

        $totalMonto = $pagocurso->sum('monto');
        
        $pdf = PDF::setPaper('LETTER', 'landscape')->loadView('pagocurso.pdf', [
            'pagocurso' => $pagocurso,
            'totalMonto' => $totalMonto
        ]);

        // return $pdf->stream();

        // return view('pagocurso')->with('pagocurso',$pagocurso)->with('totalMonto',$totalMonto);

        // return view('pagocurso.pdfid', compact('pagocurso', 'totalMonto'));
        return $pdf->stream();

    }

    
    public function enviarReporte($id)
    {
        $pagocurso = Pagocurso::select('pagocursos.id', 'facursos.Nombre as nombrecurso', 'estudiantes.Email', 'estudiantes.Nombre as nombreestudiante', 'estudiantes.ApellidoPaterno', 'estudiantes.ApellidoMaterno', 'pagocursos.fecha', 'pagocursos.monto', 'pagocursos.estado_pagocurso')
        ->from('pagocursos')
        ->join('adquirircursos', 'adquirircursos.id', '=', 'pagocursos.id_adquirircurso')
        ->join('facursos', 'adquirircursos.id_curso', '=', 'facursos.id')
        ->join('estudiantes', 'adquirircursos.id_estudiante', '=', 'estudiantes.id')
        ->where('pagocursos.id', $id)
        ->orderBy('pagocursos.id', 'asc')
        ->get();

    $totalMonto = $pagocurso->sum('monto');

    $emailEstudiante = $pagocurso->first()->Email;

    Mail::to($emailEstudiante)->send(new ReportePagoMail($pagocurso, $totalMonto));

    return response()->json(['message' => 'Correo enviado con éxito']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reportepago  $reportepago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reportepago $reportepago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reportepago  $reportepago
     * @return \Illuminate\Http\Response
     */
    public function destroy(reportepago $reportepago)
    {
        //
    }
}
