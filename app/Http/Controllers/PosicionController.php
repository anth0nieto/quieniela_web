<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use DB;
use quiniela\Puntuaciones;
use Session;
use Redirect;

class PosicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $puntuaciones = DB::table('puntuaciones')->join('user_quinielas','puntuaciones.id_user','=','user_quinielas.id')
                                            ->select('user_quinielas.username','puntuaciones.ptos','puntuaciones.ganadores','puntuaciones.resultados')
                                            ->orderBy('puntuaciones.ptos', 'desc')
                                            ->get();

        return view('posicion.index',compact('puntuaciones'));
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


    public function act_pos()
    {    
        $id_quin = session()->get('id_q1');
       // $carbon = new \Carbon\Carbon();
        $date = date('Y-m-d');

        $resultados = DB::table('resultado_admins')
                    ->join('partidos','resultado_admins.id_partido','=','partidos.id_partido')
                    ->where('partidos.fecha', '<=', $date)
                    ->where('resultado_admins.id_quiniela', '=', $id_quin)
                    ->select('partidos.id_partido','partidos.fecha','resultado_admins.goles_local','resultado_admins.goles_visitante')
                    ->orderBy('partidos.fecha')
                    ->get();

        $usuarios = DB::table('puntuaciones')
                    ->where('puntuaciones.id_quiniela', '=', $id_quin)
                    ->select('puntuaciones.id_user','puntuaciones.ptos','puntuaciones.ganadores','puntuaciones.resultados')
                    ->get();


        foreach($usuarios as $usuario)
        {
            $pronosticos = DB::table('pronosticos')
                    ->join('partidos','pronosticos.id_partido','=','partidos.id_partido')
                    ->where('partidos.fecha', '<=', $date)
                    ->where('pronosticos.id_quiniela', '=', $id_quin)
                    ->where('pronosticos.id_user', '=', $usuario->id_user)
                    ->select('partidos.id_partido','partidos.fecha','pronosticos.goles_local','pronosticos.goles_visitante')
                    ->orderBy('partidos.fecha')
                    ->get();

                


            $co = 0;

             $usr_resultado = 0;
            $usr_ganadores = 0;

            foreach($pronosticos as $pronostico)   
            {   


            

                    if((int)$pronostico->goles_local == (int)$resultados[$co]->goles_local and
                        (int)$pronostico->goles_visitante == (int)$resultados[$co]->goles_visitante)        
                    {
                       $usr_resultado++;
                    }

                    if((int)$pronostico->goles_local < (int)$pronostico->goles_visitante and
                        (int)$resultados[$co]->goles_local < (int)$resultados[$co]->goles_visitante)        
                    {
                       $usr_ganadores++; 
                    }


                    if((int)$pronostico->goles_local > (int)$pronostico->goles_visitante and
                       (int)$resultados[$co]->goles_local > (int)$resultados[$co]->goles_visitante)        
                    {
                       $usr_ganadores++;
                    }


                    if((int)$pronostico->goles_local == (int)$pronostico->goles_visitante and
                       (int)$resultados[$co]->goles_local == (int)$resultados[$co]->goles_visitante)        
                    {
                       $usr_ganadores++; 
                    }

                    DB::table('puntuaciones')->where('id_user', $usuario->id_user)
                            ->update(['ptos'=> ($usr_ganadores*2) + ($usr_resultado*3),
                                      'ganadores'=> $usr_ganadores,
                                      'resultados'=> $usr_resultado]);

                    $co++;


                

            }   



        }


       Session::flash('message','Posiciones editadas exitosamente');
        return Redirect::to('/posicion');

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
