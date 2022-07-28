<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscador = $request ->buscar;
        $registro = Registro::where('numero_identificacion' , 'LIKE' , '%' .$buscador . '%')
        ->orwhere('tipo', 'LIKE' , '%' .$buscador. '%')
        ->paginate(5);
        return view('registro.index', compact('registro', 'buscador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new Registro;
        $registro->numero_identificacion = $request ->numero_identificacion;
        $registro->tipo = $request->tipo;

        $registro->save();


        return redirect()->route('registros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Registro::find($id);
        return view('registro.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $registro =Registro::find($id);
        $registro->numero_identificacion = $request ->numero_identificacion;
        $registro->tipo = $request->tipo;

        $registro->save();
        return redirect()->route('registros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registro::destroy($id);

        return redirect()->route('registros.index');
    }
}
