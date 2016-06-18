<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\Pronostico;
use quiniela\Puntuaciones;
use DB;
use Session;

class PronosticoController extends Controller
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
        $id_user = ($_GET['id_user']);
        $id_quin1 = DB::table('user_quinielas')->where('id','=',$id_user)->value('id_quiniela');

        $partidos = DB::table('partidos')->join('equipos','equipos.id_equipo','=','partidos.id_local')
                                        ->where('partidos.id_quiniela','=',$id_user)
                                        ->select('partidos.id_partido','partidos.id_local','partidos.id_visitante','equipos.grupo','partidos.fecha')
                                        ->get();
        
        //$arrayName = array('' => , );
        session(['id_quin1'=>$id_quin1]);
        session(['id_user'=>$id_user]);

       
        return view('pronostico.jugarQuiniela',compact('partidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Puntuaciones::create([
            'id_user' =>  session()->get('id_user'),
            'id_quiniela' => session()->get('id_quin1'),
            'ganadores' => 0,
            'resultados' => 0,
            'ptos' => 0,
        ]);
        
        for($i=0; $i<=11; $i++){

        Pronostico::create([
            'id_partido' => $request['id_partido_'.$i],
            'id_user' =>  session()->get('id_user'),
            'id_quiniela' => session()->get('id_quin1'),
            'goles_local' => $request['goles_local_'.$i],
            'goles_visitante' => $request['goles_visitante_'.$i],
        ]);
        }

        


        Session::flash('message-success','Quiniela Jugada');
        return redirect('/misQuinielas');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
