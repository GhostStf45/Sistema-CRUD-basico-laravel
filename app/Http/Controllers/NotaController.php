<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use App;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notas = App\Nota::paginate(4);
        return view('inicio', ['notas'=>$notas]);
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
        $notaAgregar = new Nota();
        $request->validate([
           'nombre' => 'required',
           'descripcion' => 'required'
        ]);
        $notaAgregar->nombre = $request->nombre;
        $notaAgregar->descripcion = $request->descripcion;
       
        $notaAgregar->save();
        
        return back()->with('agregar','La nota se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nota = App\Nota::findOrFail($id);
        return view('editar', ['nota' => $nota ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $notaUpdate = App\Nota::findOrFail($id);
        $request->validate([
           'nombre' => 'required',
           'descripcion' => 'required'
        ]);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        
        $notaUpdate->save();
        
        return back()->with('update', 'La nota ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $notaDelete = App\Nota::findOrFail($id);
        $notaDelete->delete();
        redirect()->route('inicio');
        return back()->with('delete', 'La nota ha sido borrada correctamente');
    }
}
