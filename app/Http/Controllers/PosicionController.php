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
    public function __construct()
    {   
       $this->middleware('admin');
    }
  
    public function index()
    {
        $id_quin = session()->get('id_q1');

        $puntuaciones = DB::table('puntuaciones')->join('user_quinielas','puntuaciones.id_user','=','user_quinielas.id')
                                            ->where('puntuaciones.id_quiniela',$id_quin)
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
                    ->orderBy('partidos.id_partido','asc')
                    ->get();


        $usuarios = DB::table('puntuaciones')
                    ->where('puntuaciones.id_quiniela', '=', $id_quin)
                    ->select('puntuaciones.id_user','puntuaciones.ptos','puntuaciones.ganadores','puntuaciones.resultados')
                    ->get();


        
        foreach($usuarios as $usuario)
        {
            $user = DB::table('user_quinielas')->where('id','=',$usuario->id_user)->first();

            $pronosticos = DB::table('pronosticos')
                    ->join('partidos','pronosticos.id_partido','=','partidos.id_partido')
                    ->where('partidos.fecha', '<=', $date)
                    ->where('pronosticos.id_quiniela', '=', $user->id_quiniela)
                    ->where('pronosticos.id_user', '=', $usuario->id_user)
                    ->select('partidos.id_partido','partidos.fecha','pronosticos.goles_local','pronosticos.goles_visitante')
                    ->orderBy('partidos.fecha')
                    ->orderBy('partidos.id_partido','asc')
                    ->get();

            $i = 0;
            $co = 0;
            $usr_resultado = 0;
            $usr_ganadores = 0;
            $foo = FALSE;
            foreach($resultados as $resultado)   
            {   
                    $co = 0;
                    foreach($pronosticos as $pronostico)
                    {
                        if($pronostico->id_partido == $resultado->id_partido)
                            break;

                        $co++;  
                    }
                    /*if((int)$pronosticos[$co]->goles_local == (int)$resultado->goles_local &&                                  (int)$pronosticos[$co]->goles_visitante == (int)$resultado->goles_visitante)
                    {
                        $usr_resultado++;
                    }

                    if((int)$pronosticos[$co]->goles_local > (int)$pronosticos[$co]->goles_visitante &&                        (int)$resultado->goles_local > (int)$resultado->goles_visitante)
                    {
                        $usr_ganadores++;
                    }

                    if((int)$pronosticos[$co]->goles_local < (int)$pronosticos[$co]->goles_visitante &&                        (int)$resultado->goles_local < (int)$resultado->goles_visitante)
                    {
                        $usr_ganadores++;
                    }

                    if((int)$pronosticos[$co]->goles_local == (int)$pronosticos[$co]->goles_visitante &&                       (int)$resultado->goles_local == (int)$resultado->goles_visitante)
                    {
                        $usr_ganadores++;
                    }*/

                    if($foo == FALSE)
                    {
                        if((int)$pronosticos[$co]->goles_local == (int)$pronosticos[$co]->goles_visitante &&
                        (int)$resultado->goles_local == (int)$resultado->goles_visitante)
                        {
                            $usr_ganadores++;
                            if((int)$pronosticos[$co]->goles_local == (int)$resultado->goles_local &&
                                (int)$pronosticos[$co]->goles_visitante == (int)$resultado->goles_visitante)
                            {
                                $usr_resultado++;
                                $foo = TRUE;
                            }
                            $foo = TRUE;
                        }
                    }

                    if($foo == FALSE)
                    {
                        if((int)$pronosticos[$co]->goles_local < (int)$pronosticos[$co]->goles_visitante &&
                            (int)$resultado->goles_local < (int)$resultado->goles_visitante)
                        {
                            $usr_ganadores++;
                            if((int)$pronosticos[$co]->goles_local == (int)$resultado->goles_local &&
                                (int)$pronosticos[$co]->goles_visitante == (int)$resultado->goles_visitante)
                            {
                                $usr_resultado++;
                                $foo = TRUE;
                            }
                            $foo = TRUE;
                        }
                    }

                    if($foo == FALSE)
                    {
                        if((int)$pronosticos[$co]->goles_local > (int)$pronosticos[$co]->goles_visitante &&                        (int)$resultado->goles_local > (int)$resultado->goles_visitante)
                        {
                            $usr_ganadores++;
                            if((int)$pronosticos[$co]->goles_local == (int)$resultado->goles_local &&
                                (int)$pronosticos[$co]->goles_visitante == (int)$resultado->goles_visitante)
                            {
                                $usr_resultado++;
                                $foo = TRUE;
                            }   
                            $foo = TRUE;
                        }
                    } 

                    DB::table('puntuaciones')->where('id_user', $usuario->id_user)
                            ->update(['ptos'=> ($usr_ganadores*2) + ($usr_resultado*3),
                                      'ganadores'=> $usr_ganadores,
                                      'resultados'=> $usr_resultado]);

                    /*DB::table('puntuaciones')->where('id_user', $usuario->id_user)
                            ->update(['ptos'=> (0*2) + (0*3),
                                      'ganadores'=> 0,
                                      'resultados'=> 0]);*/

                    $co++;
                    $foo = FALSE;
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
