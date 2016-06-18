<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;

use quiniela\Partido;
use DB;
use Session;
use Redirect;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::paginate(1000);
        $id_quin = session()->get('id_q1');
        return view('partido.index',compact('partidos'), compact('id_quin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // session_start();
        $id_quiniela= session()->get('id_q1');
        return view('partido.create',compact('id_quiniela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fase = true;
        $grupos = array('A','B','C','D','E','F');
        $id_quiniela = session()->get('id_q1');

        for ($j = 0; $j <= 1; $j++) {

            $grupo = $grupos[$j];
            for ($i = 1; $i <= 6; $i++) {
                
                $local = $request['local_'.$i.$grupo];
                $visitante = $request['visitante_'.$i.$grupo];
                $fecha = $request['fecha_'.$i.$grupo];

                Partido::create([
                'id_partido'=> $local.$visitante.$fecha,
                'id_quiniela'=> $id_quiniela,
                'id_local'=> $local,
                'id_visitante'=> $visitante,
                'fecha'=> $fecha,
                'fase_grupo'=> $fase,
                 ]);
            }
        }  
        Session::flash('message','Paridos creados exitosamente');
        return Redirect::to('/partido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partido = Partido::find_all_partido($id);
        return view('partido.edit',['partido'=>$partido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $partido = Partido::find_all_partido($id);
        $partido->fill($request->all());
        //$partido->save();

                $local = $request['id_local'];
                $visitante = $request['id_visitante'];
                $fecha = $request['fecha'];

        DB::table('partidos')->where('id_partido', $id)->update(
            ['id_partido'=> $local.$visitante.$fecha,
            'id_local'=> $local,
            'id_visitante'=> $visitante,
            'fecha'=> $fecha]);

        Session::flash('message','Partido editado exitosamente');
        return Redirect::to('/partido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
