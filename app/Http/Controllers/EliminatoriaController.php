<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\Http\Requests\SegundaFaseRequest;
use Session;
use Redirect;

use quiniela\Pronostico;
use quiniela\Puntuaciones;
use DB;

class EliminatoriaController extends Controller
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

        $id_quiniela = ($_GET['id_uiniela']);
        $id_user = ($_GET['id_ser']);



        $flags = array
        (
          "fra"=>"../images/France.png",
          "alb"=>"../images/Albania.png",
          "aus"=>"../images/Austria.png",
          "bel"=>"../images/Belgium.png",
          "cro"=>"../images/Croatia.png",
          "che"=>"../images/CzechRepublic.png",
          "ing"=>"../images/England.png",
          "ale"=>"../images/Germany.png",
          "hun"=>"../images/Hungary.png",
          "isl"=>"../images/Iceland.png",
          "irl"=>"../images/Ireland.png",
          "ita"=>"../images/Italy.png",
          "irn"=>"../images/NorthernIreland.png",
          "pol"=>"../images/Poland.png",
          "por"=>"../images/Portugal.png",
          "rum"=>"../images/Romania.png",
          "rus"=>"../images/RussianFederation.png",
          "esl"=>"../images/Slovakia.png",
          "esp"=>"../images/Spain.png",
          "sue"=>"../images/Sweden.png",
          "sui"=>"../images/Switzerland.png",
          "tur"=>"../images/Turkey.png",
          "ucr"=>"../images/Ukraine.png",
          "gal"=>"../images/Wales.png",
        );


        $partidos = DB::table('partidos')->join('equipos','equipos.id_equipo','=','partidos.id_local')
                                        ->where('partidos.id_quiniela','=',$id_quiniela)
                                        ->where('equipos.id_quiniela','=',$id_quiniela)
                                        ->where('partidos.fase_grupo','=','2')
                                        ->select('partidos.id_partido','partidos.id_local','partidos.id_visitante','equipos.grupo','partidos.fecha','equipos.nombre')
                                        ->get();

        $partidos1 = DB::table('partidos')->join('equipos','equipos.id_equipo','=','partidos.id_visitante')
                                        ->where('partidos.id_quiniela','=',$id_quiniela)
                                        ->where('equipos.id_quiniela','=',$id_quiniela)
                                        ->where('partidos.fase_grupo','=','2')
                                        ->select('partidos.id_partido','partidos.id_local','partidos.id_visitante','equipos.grupo','partidos.fecha','equipos.nombre')
                                        ->get();



        foreach ($partidos as $partido) 
        {
            $partido->bandera = $flags[$partido->id_local]; 
        }

        foreach ($partidos1 as $partido) 
        {
            $partido->bandera = $flags[$partido->id_visitante]; 
        }


        return view('segundafase.jugarSegundaFase',compact('partidos','partidos1','id_quiniela','id_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SegundaFaseRequest $request)
    {


            $id_quiniela = $request['id_quiniela'];
            $id_user = $request['id_user'];
        
            for ($j = 0; $j <= 14; $j++) 
            {
         
              $pronostico = New Pronostico;
              // Guardando los registros en la tabla
              $pronostico->id_partido = $request['id_local_'.$j].$request['id_visitante_'.$j];
              $pronostico->id_user = $id_user;
              $pronostico->id_quiniela = $id_quiniela;
              $pronostico->goles_local = $request['goles_local_'.$j];
              
              if ($j <= 7) 
              {
               $pronostico->fase = 1;
              }
              else if($j <= 11)
              {
                $pronostico->fase = 2;
              } 
              else if($j <= 13)
              {
                $pronostico->fase = 3;
              }
              else if($j == 14)
                $pronostico->fase = 4;
                         
              $pronostico->goles_visitante = $request['goles_visitante_'.$j];
              $pronostico->save();
            }
            
              $pronostico = New Pronostico;
              // Guardando los registros en la tabla
              $pronostico->id_partido = $request['id_equipo30'];
              $pronostico->id_user = $id_user;
              $pronostico->id_quiniela = $id_quiniela;
              $pronostico->goles_local = 0;
              $pronostico->fase = 5;
              $pronostico->goles_visitante = 0;
              $pronostico->save();

      Session::flash('message','Segunda Fase Guardada');
      return Redirect::to('/showQuinielas');    
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
