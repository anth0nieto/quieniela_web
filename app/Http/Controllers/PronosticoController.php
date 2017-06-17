<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\Http\Requests\Pronosticorequest;
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
        $id_quiniela = ($_GET['gknbgjn']);
        $id_user = ($_GET['aasdaf']);

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
                                        ->where('partidos.fase_grupo','=','1')
                                        ->select('partidos.id_partido','partidos.id_local','partidos.id_visitante','equipos.grupo','partidos.fecha','equipos.nombre')
                                        ->get();

        $partidos1 = DB::table('partidos')->join('equipos','equipos.id_equipo','=','partidos.id_visitante')
                                        ->where('partidos.id_quiniela','=',$id_quiniela)
                                        ->where('equipos.id_quiniela','=',$id_quiniela)
                                        ->where('partidos.fase_grupo','=','1')
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




        return view('pronostico.jugarQuiniela',compact('partidos','partidos1','id_quiniela','id_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pronostico_user(Pronosticorequest  $request)
    {
    
    	$pro_cnt = DB::table('pronosticos')->where('pronosticos.id_user','=',$request->id_user)
                                               ->count();
        if($pro_cnt > 0)
        {
          
          Session::flash('message-error','Ya has jugado esta quiniela');
          return Redirect::to('/misQuinielas');
        }
        
        
        // GUARDANDO LOS REGISTROS EN LA BASE DE DATOS
        for ($i=0; $i < 36 ; $i++)
        { 
           $aux_local = "equipo_local_".$i;
           $nombre_local = $request->$aux_local;

           $aux_visitante = "equipo_visitante_".$i;
           $nombre_visitante = $request->$aux_visitante;

            $equipo_local = DB::table('equipos')
                            ->select('id_equipo')
                            ->where('nombre', $nombre_local)
                            ->get();

            $equipo_visitante = DB::table('equipos')
                            ->select('id_equipo')
                            ->where('nombre', $nombre_visitante)
                            ->get();

            $partido = DB::table('partidos')
                          ->select('id_partido','id_quiniela','fase_grupo')
                          ->where('id_local', $equipo_local[0]->id_equipo)
                          ->where('id_visitante', $equipo_visitante[0]->id_equipo)
                          ->get();

           $goles_local = "goles_local_".$i;
           $goles_visitante = "goles_visitante_".$i;

           $pronostico = New Pronostico;

          // Guardando los registros en la tabla
            $pronostico->id_partido = $partido[0]->id_partido;
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $partido[0]->id_quiniela;
            $pronostico->goles_local = $request->$goles_local;
            $pronostico->fase = 0;
            $pronostico->goles_visitante = $request->$goles_visitante;

            $pronostico->save();
        }


        $grupo_A = array(
            "Francia" => array(0,0,0,0), // NOMBRE|PUNTOS|DIFERENCIA|GOLES + | GOLES -
            "Rumania" => array(0,0,0,0),
            "Albania" => array(0,0,0,0),
            "Suiza" => array(0,0,0,0),
        );

        $grupo_B = array(
            "Inglaterra" => array(0,0,0,0),
            "Rusia" => array(0,0,0,0),
            "Gales" => array(0,0,0,0),
            "Eslovaquia" => array(0,0,0,0),
        );

        $grupo_C = array(
            "Alemania" => array(0,0,0,0),
            "Ucrania" => array(0,0,0,0),
            "Polonia" => array(0,0,0,0),
            "Irlanda N." => array(0,0,0,0),
        );

        $grupo_D = array(
            "España" => array(0,0,0,0),
            "R. Checa" => array(0,0,0,0),
            "Turquia" => array(0,0,0,0),
            "Croacia" => array(0,0,0,0),
        );

        $grupo_E = array(
            "Belgica" => array(0,0,0,0),
            "Italia" => array(0,0,0,0),
            "Irlanda" => array(0,0,0,0),
            "Suecia" => array(0,0,0,0),
        );

        $grupo_F = array(
            "Portugal" => array(0,0,0,0),
            "Austria" => array(0,0,0,0),
            "Islandia" => array(0,0,0,0),
            "Hungria" => array(0,0,0,0),
        );

        $posicion_A = array("Francia","Rumania","Albania","Suiza");
        $posicion_B = array("Inglaterra","Rusia","Gales","Eslovaquia");
        $posicion_C = array("Alemania","Ucrania","Polonia","Irlanda N.");
        $posicion_D = array("España","R. Checa","Turquia","Croacia");
        $posicion_E = array("Belgica","Italia","Irlanda","Suecia");
        $posicion_F = array("Portugal","Austria","Islandia","Hungria");

        // GRUPO A
        for ($i=0; $i < 6 ; $i++)
        { 
            // GOLES A FAVOR
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_A[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_A[$nombre][2] += (int)($request->$aux_2);

           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_A[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_A[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_A[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_A[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_A[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_A[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_A[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_A[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_A[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_A[$nombre][0] += 1;

        }

        

        // GRUPO B
        for ($i=6; $i <12  ; $i++)
        { 
            // GOLES A FAVOR
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_B[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_B[$nombre][2] += (int)($request->$aux_2);

           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_B[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_B[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_B[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_B[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_B[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_B[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_B[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_B[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_B[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_B[$nombre][0] += 1;           
        }


        // GRUPO C
        for ($i=12; $i <18  ; $i++)
        { 
            // GOLES A FAVOR
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_C[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_C[$nombre][2] += (int)($request->$aux_2);

           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_C[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_C[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_C[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_C[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_C[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_C[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_C[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_C[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_C[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_C[$nombre][0] += 1;
            
        }

        // GRUPO D
        for ($i=18; $i <24  ; $i++)
        { 

            // GOLES A FAVOR          
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_D[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_D[$nombre][2] += (int)($request->$aux_2);


           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_D[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_D[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_D[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_D[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_D[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_D[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_D[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_D[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_D[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_D[$nombre][0] += 1;
            
        }


        // GRUPO E
        for ($i=24; $i <30  ; $i++)
        { 
            // GOLES A FAVOR
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_E[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_E[$nombre][2] += (int)($request->$aux_2);


           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_E[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_E[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_E[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_E[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_E[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_E[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_E[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_E[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_E[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_E[$nombre][0] += 1;
            
        }

        // GRUPO F
        for ($i=30; $i <36  ; $i++)
        { 
            // GOLES A FAVOR
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_F[$nombre][2] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_F[$nombre][2] += (int)($request->$aux_2);

           // GOLES EN CONTRA
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_visitante_".$i;
           $grupo_F[$nombre][3] += (int)($request->$aux_2);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $grupo_F[$nombre][3] += (int)($request->$aux_2);

           // DIFERENCIA DE GOLES
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           $grupo_F[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           $grupo_F[$nombre][1] += (int)($request->$aux_2 - $request->$aux_3);

           
           // CALCULO DE PUNTOS
           $aux = "equipo_local_".$i;
           $nombre = $request->$aux;
           $aux_2 = "goles_local_".$i;
           $aux_3 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_F[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_F[$nombre][0] += 0;
            elseif($request->$aux_2 == $request->$aux_3)
                $grupo_F[$nombre][0] += 1;

           $aux = "equipo_visitante_".$i;
           $nombre = $request->$aux;
           $aux_3 = "goles_local_".$i;
           $aux_2 = "goles_visitante_".$i;
           if($request->$aux_2 > $request->$aux_3)
                $grupo_F[$nombre][0] += 3;
           elseif($request->$aux_2 < $request->$aux_3)
                $grupo_F[$nombre][0] += 0;
           elseif($request->$aux_2 == $request->$aux_3)
                $grupo_F[$nombre][0] += 1;
            
        }
        

        // ORDENANDO LA TABLA DE POSICIONES GRUPO A
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_A[$posicion_A[$i]][0] < $grupo_A[$posicion_A[$j]][0] ) 
                {
                    $aux =  $posicion_A[$i];
                    $posicion_A[$i] =  $posicion_A[$j];
                    $posicion_A[$j] =  $aux;
                }
            }
        }


        // ORDENANDO LA TABLA DE POSICIONES GRUPO B
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_B[$posicion_B[$i]][0] < $grupo_B[$posicion_B[$j]][0] ) 
                {
                    $aux =  $posicion_B[$i];
                    $posicion_B[$i] =  $posicion_B[$j];
                    $posicion_B[$j] =  $aux;
                }
            }
        }

        // ORDENANDO LA TABLA DE POSICIONES GRUPO C
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_C[$posicion_C[$i]][0] < $grupo_C[$posicion_C[$j]][0] ) 
                {
                    $aux =  $posicion_C[$i];
                    $posicion_C[$i] =  $posicion_C[$j];
                    $posicion_C[$j] =  $aux;
                }
            }
        }

        // ORDENANDO LA TABLA DE POSICIONES GRUPO D
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_D[$posicion_D[$i]][0] < $grupo_D[$posicion_D[$j]][0] ) 
                {
                    $aux =  $posicion_D[$i];
                    $posicion_D[$i] =  $posicion_D[$j];
                    $posicion_D[$j] =  $aux;
                }
            }
        }

        // ORDENANDO LA TABLA DE POSICIONES GRUPO E
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_E[$posicion_E[$i]][0] < $grupo_E[$posicion_E[$j]][0] ) 
                {
                    $aux =  $posicion_E[$i];
                    $posicion_E[$i] =  $posicion_E[$j];
                    $posicion_E[$j] =  $aux;
                }
            }
        }

        // ORDENANDO LA TABLA DE POSICIONES GRUPO F
        for ($i=0; $i < 4; $i++)
        { 
            for ($j=$i; $j < 4; $j++)
            { 
                if($grupo_F[$posicion_F[$i]][0] < $grupo_F[$posicion_F[$j]][0] ) 
                {
                    $aux =  $posicion_F[$i];
                    $posicion_F[$i] =  $posicion_F[$j];
                    $posicion_F[$j] =  $aux;
                }
            }
        }



        // Guardando los 2 primeros de cada grupo
        for ($i=0; $i <2 ; $i++)
        { 
            

            /* Parte rebuscada para obtener los 2 primeros de cada grupo
               En la tabla de pronosticos hay una columna que se llama fase,
               con este campo vamos a discriminar los equipos que el usuario
               coloco como los que van a pasar de fase grupo a octavos,
               se le pondra un "1" para identificar que son los que se van a pasar a octavos.
               en el campo id_partido se va a colocar solo el nombre del equipo
               que el usuario coloco para que pasara a la siguiente fase
               los goles de local y visitante se colocan null
            */

            // GRUPO A
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_A[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_A[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();

            // GRUPO B
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_B[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_B[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();

            // GRUPO C
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_C[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_C[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();

            // GRUPO D
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_D[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_D[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();

            // GRUPO E
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_E[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_E[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();

            // GRUPO F
            $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $posicion_F[$i])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $posicion_F[$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();
        }

        // Guardando los 4 mejores terceros
       
        $terceros = array (
                              array($posicion_A[2],$grupo_A[$posicion_A[2]][0],$grupo_A[$posicion_A[2]][1]),
                              array($posicion_B[2],$grupo_B[$posicion_B[2]][0],$grupo_B[$posicion_B[2]][1]),
                              array($posicion_C[2],$grupo_C[$posicion_C[2]][0],$grupo_C[$posicion_C[2]][1]),
                              array($posicion_D[2],$grupo_D[$posicion_D[2]][0],$grupo_D[$posicion_D[2]][1]),
                              array($posicion_E[2],$grupo_E[$posicion_E[2]][0],$grupo_E[$posicion_E[2]][1]),
                              array($posicion_F[2],$grupo_F[$posicion_F[2]][0],$grupo_F[$posicion_F[2]][1]),
                              );
        // ORDENANDO EL VECTOR
        for ($i=0; $i < 6; $i++)
        { 
            for ($j=$i; $j < 6; $j++)
            { 
                if($terceros[$i][1] <= $terceros[$j][1]) 
                {
                    if($terceros[$i][1] == $terceros[$j][1]) 
                    {
                      if($terceros[$i][2] < $terceros[$j][2]) 
                      {
                        $aux =  $terceros[$i];
                        $terceros[$i] =  $terceros[$j];
                        $terceros[$j] =  $aux;
                      }
                    }
                    else
                    {
                      $aux =  $terceros[$i];
                      $terceros[$i] =  $terceros[$j];
                      $terceros[$j] =  $aux;
                    }
                }
            }
        }
        
        // GUARDANDO LOS MEJORES TERCEROS EN LA TABLA
        for ($i=0; $i < 4; $i++)
        { 
          $equipo = DB::table('equipos')
                            ->select('id_quiniela')
                            ->where('nombre', $terceros[$i][0])
                            ->get();

            $pronostico = New Pronostico;

            $pronostico->id_partido = $terceros[$i][0];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $equipo[0]->id_quiniela;
            $pronostico->fase = -1;

            $pronostico->save();
        }

        //$resultado = $grupo_A["francia"][0] ." ".$grupo_A["rumania"][0] ." ".$grupo_A["albania"][0] ." ".$grupo_A["suiza"][0];
        //return $posicion_A;
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

    public function PronosticoNuevaQuiniela(Request $request)
    {

        $id_user = $request['id_user'];

        $id_quiniela = $request['id_quiniela'];

        $partidos = DB::table('partidos')->where('partidos.id_quiniela','=',$id_quiniela )
                                        ->select('partidos.*')
                                        ->get();


        $partidos1 = DB::table('partidos')->join('equipos','equipos.nombre','=','partidos.id_visitante')
                                        ->where('partidos.id_quiniela','=',$id_quiniela)
                                        ->where('equipos.id_quiniela','=',0)
                                        ->select('partidos.id_partido','partidos.id_local','partidos.id_visitante','equipos.grupo','partidos.fecha','equipos.nombre')
                                        ->get();


        return view('pronostico.jugarQuinielaNuevo',compact('partidos','partidos1','id_quiniela','id_user'));
    }

    public function pronostico_user_nuevo(Request $request)
    {

         $cont = DB::table('partidos')
                            ->select('id_quiniela')
                            ->where('id_quiniela', $request['id_quiniela'])
                            ->get();



        // GUARDANDO LAS JUGADAS DE LOS USUARIOS
        for ($i=0; $i < count($cont); $i++)
        { 

            $pronostico = New Pronostico;

            $pronostico->id_partido = $request['id_partido_'.$i];
            $pronostico->goles_local = $request['goles_local_'.$i];
            $pronostico->goles_visitante = $request['goles_visitante_'.$i];
            $pronostico->id_user = $request->id_user;
            $pronostico->id_quiniela = $request->id_quiniela;
            $pronostico->fase = -10;

            $pronostico->save();
        }

        Session::flash('message-success','Quiniela Jugada');
        return redirect('/misQuinielas');
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