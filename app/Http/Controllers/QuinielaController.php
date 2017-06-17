<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use Session;
use Redirect;
use Carbon\Carbon;
use quiniela\Http\Requests\QuinielaRequest;
use quiniela\Quiniela;
use quiniela\UserQuiniela;
use quiniela\UserTransaccion;
use Auth;

use DB;

class QuinielaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quinielas = Quiniela::paginate(12);
        return view('quiniela.index',compact('quinielas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiniela.create');
    }

    public function showQuinielas()
    {

        // Añadir filtros de informacion para mostrar las quinielas actuales-disponibles
        $quinielas = DB::table('quinielas')->where('fecha_finalizacion', '>=', date('Y-m-d'))->get();
       

        $username = Auth::user()->username;
        $user_quinielas = DB::table('user_quinielas')
                            ->where('username','=',$username)
                            ->get();

        return view('user.showQuinielas',compact('quinielas'));
    }

    public function finalizar(Request $request)
    {
        $ranking = array();

        $quiniela = DB::table('quinielas')
                        ->where('quinielas.id','=',$request['quiniela_id'])
                        ->select('quinielas.finalizado','quinielas.costo')
                        ->first();

      
        if ($quiniela->finalizado == 0) 
        {
        
            $id_quiniela = $request['quiniela_id'];

            $usuarios = DB::table('user_quinielas')
                            ->where('user_quinielas.id_quiniela',$id_quiniela)
                            ->where('user_quinielas.status','=','Inscrito')
                            ->select('user_quinielas.id','user_quinielas.username')
                            ->get();


            $resultados_reales = DB::table('resultado_admins')
                                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                                        ->where('resultado_admins.id_quiniela','=',$id_quiniela)
                                        ->where('resultado_admins.fase','=',-11)
                                        ->select('resultado_admins.id_partido','resultado_admins.id_quiniela','resultado_admins.goles_local','resultado_admins.goles_visitante','partidos.id_local','partidos.id_visitante')                                 
                                        ->get();

            foreach ($usuarios as $usuario)
            {
                $puntos = 0;
                $resultados = 0;
                $ganador = 0;

                $resultados_usuarios = DB::table('pronosticos')
                                        ->join('user_quinielas','user_quinielas.id','=','pronosticos.id_user')
                                        ->where('pronosticos.id_user','=',$usuario->id)
                                        ->where('pronosticos.id_quiniela','=',$id_quiniela)
                                        ->select('pronosticos.id_partido','pronosticos.id_quiniela','pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user')                                 
                                        ->get();
               
                if (!empty($resultados_usuarios))
                {
                    $i = 0;
                    foreach ($resultados_usuarios as $resultado)
                    {

                        if (!empty($resultados_reales))
                        {
                            //foreach ($resultados_reales as $resultados_admin)
                            {  

                                // Resultado
                                if(($resultado->goles_local == $resultados_reales[$i]->goles_local) and ($resultado->goles_visitante == $resultados_reales[$i]->goles_visitante))
                                {
                                    $puntos += 3;
                                    $resultados += 1;
                                }
                                        
                                // Ganador Visitante
                                if(   (($resultado->goles_local - $resultado->goles_visitante) < 0 ) and (($resultados_reales[$i]->goles_local - $resultados_reales[$i]->goles_visitante) < 0 ) )
                                {

                                    $puntos += 1;
                                    $ganador += 1;
                                }

                                // Ganador Local
                                if(   (($resultado->goles_local - $resultado->goles_visitante) > 0 ) and (($resultados_reales[$i]->goles_local - $resultados_reales[$i]->goles_visitante) > 0 ) )
                                {

                                    $puntos += 1;
                                    $ganador += 1;
                                }

                                // Epate ---> igual es ganador
                                if(($resultado->goles_local - $resultado->goles_visitante == 0 ) and ($resultados_reales[$i]->goles_local - $resultados_reales[$i]->goles_visitante == 0 )) 
                                {

                                    $puntos += 1;
                                    $ganador += 1;
                                }
                            }
                        }
                        $i++;
                    }
                }

                array_push($ranking, array($usuario->username,$usuario->id,$puntos,$ganador,$resultados));
            }

            for ($i=0; $i < count($ranking); $i++)
            { 
                for ($j=$i; $j < count($ranking); $j++)
                { 
                    if($ranking[$i][2] < $ranking[$j][2])
                    {
                        $aux = $ranking[$i];
                        $ranking[$i] = $ranking[$j];
                        $ranking[$j] = $aux;
                    }
                }
            }
             

            /*DB::table('quinielas')
            ->where('quinielas.id', $request['quiniela_id'])
            ->update(['finalizado' => 1]);
            */
            
            

            $usuario_ganador =  DB::table('users')
                    ->join('personas', 'users.email', '=', 'personas.email')
                    ->where('username', $ranking[0][0])
                    ->select('personas.creditoDisponible','personas.email')
                    ->get();

            // Haciendo la lista de los ganadores
            $i = 0;
            while($ranking[$i][2] == $ranking[0][2])
            {
                $ganadores[$i] = $ranking[$i][0];
                $i++;
            }


            $total_usuarios = DB::table('user_quinielas')
                                ->where('id_quiniela', $request['quiniela_id'])
                                ->count();
         
            $total = $usuario_ganador[0]->creditoDisponible + ($quiniela->costo*$total_usuarios*0.7)/$i;
        

            for ($w=0; $w < $i; $w++)
            { 

                $usuario_ganador =  DB::table('users')
                    ->join('personas', 'users.email', '=', 'personas.email')
                    ->where('username', $ganadores[$w])
                    ->select('personas.creditoDisponible','personas.email')
                    ->get();

                 DB::table('personas')
                ->where('email', $usuario_ganador[0]->email) //-> Email de la persona
                ->update(array('creditoDisponible' => $total));
            }
           

            Session::flash('message','Quiniela Finalizada Exitosamente');
            return $this->index();
            
        }

        Session::flash('message','Esta Quiniela ya ha sido finalizada');
        return $this->index();
    }

    

    public function store(QuinielaRequest $request)
    {

       /* Quiniela::create([
            'nombre'=> $request['nombre'],
            'tipo_quiniela' => $request['nombre'],
            'costo'=> $request['costo'],
            'usuarios'=> $request['usuarios'],
            'ganadores'=> $request['ganadores'],
            'fecha_inicio'=> $request['fecha_inicio'],
            'fecha_finalizacion'=> $request['fecha_finalizacion'],
            
            ]);
        */

        $quiniela = New Quiniela;

        $quiniela->nombre = $request['nombre'];
        $quiniela->tipo_quiniela = $request['tipo_quiniela'];
        $quiniela->costo = $request['costo'];
        $quiniela->usuarios = $request['usuarios'];
        $quiniela->ganadores = $request['ganadores'];
        $quiniela->hora_inicio = date('H:i:s',strtotime($request['horaInicio']));
        $quiniela->fecha_inicio = date('Y-m-d', strtotime($request['fecha_inicio']));
        $quiniela->fecha_finalizacion = date('Y-m-d', strtotime($request['fecha_finalizacion']));

        $quiniela->save();
    
        Session::flash('message','Quiniela Creada Exitosamente');
        return Redirect::to('/quiniela');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function inscripcion(Request $request)
    {   

         $usuarioInscribir =  DB::table('users')
                    ->join('personas', 'users.email', '=', 'personas.email')
                    ->where('username', $request['user_nombre'])
                    ->select('personas.*')
                    ->get();


        if ($usuarioInscribir[0]->creditoDisponible >= $request['quiniela_costo']) 
        {
             UserQuiniela::create([
            'id_quiniela'=> $request['quiniela_id'],
            'username'=> $request['user_nombre'],
            'status'=> "Inscrito"]);

             $nuevoCredito = $usuarioInscribir[0]->creditoDisponible - $request['quiniela_costo'];

            DB::table('personas')
            ->where('personas.email', $usuarioInscribir[0]->email)
            ->update(['creditoDisponible' => $nuevoCredito]);

            Session::flash('message','Quiniela Inscrita Exitosamente');
            $quinielas = DB::table('quinielas')->where('fecha_finalizacion', '>', \Carbon\Carbon::now())->get();
            //return view('user.showQuinielas',compact('quinielas'));
            return Redirect::to('/misQuinielas')->with('message', 'Quiniela Inscrita Exitosamente');

        }
       
        Session::flash('error','No tiene suficientes creditos para inscribir la Quiniela');
        $quinielas = DB::table('quinielas')->where('fecha_finalizacion', '>', \Carbon\Carbon::now())->get();
        return view('user.showQuinielas',compact('quinielas'));
    }

    public function show(Request $request, $id)
    {   
        $quiniela = Quiniela::find($id);

        return $request['user_nombre'];
        return view('user.preinscripcion',compact('quiniela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiniela = Quiniela::find($id);
        return view('quiniela.edit',['quiniela'=>$quiniela]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,QuinielaRequest $request)
    {
        $quiniela = Quiniela::find($id);
        $quiniela->fill($request->all());
        $quiniela->save();
        Session::flash('message','Quiniela editada exitosamente');
        return Redirect::to('/quiniela');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiniela::destroy($id);

        Session::flash('message','Quiniela eliminada exitosamente');
        return Redirect::to('/quiniela');
    }

    public function inscribir($id){

        $quiniela = Quiniela::find($id);
        return redirect('quiniela.inscripcion',compact('quiniela'));
    }

    public function verMiQuinielaNuevo(Request $request){

        $ranking = array();

        $id_quiniela = ($request['id_quiniela']);

        $usuarios = DB::table('user_quinielas')
                        ->where('user_quinielas.id_quiniela',$id_quiniela)
                        ->where('user_quinielas.status','=','Inscrito')
                        ->select('user_quinielas.id','user_quinielas.username')
                        ->get();


        $resultados_reales = DB::table('resultado_admins')
                                    ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                                    ->where('resultado_admins.id_quiniela','=',$id_quiniela)
                                    ->where('resultado_admins.fase','=',-11)
                                    ->select('resultado_admins.id_partido','resultado_admins.id_quiniela','resultado_admins.goles_local','resultado_admins.goles_visitante','partidos.id_local','partidos.id_visitante')                                 
                                    ->get();
        

        foreach ($usuarios as $usuario)
        {
            $puntos = 0;
            $resultados = 0;
            $ganador = 0;

            $resultados_usuarios = DB::table('pronosticos')
                                    ->join('user_quinielas','user_quinielas.id','=','pronosticos.id_user')
                                    ->where('pronosticos.id_user','=',$usuario->id)
                                    ->where('pronosticos.id_quiniela','=',$id_quiniela)
                                    ->select('pronosticos.id_partido','pronosticos.id_quiniela','pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user')                                 
                                    ->get();


           
            if ($resultados_usuarios != NULL)
            {
                

                foreach ($resultados_usuarios as $resultado)
                {

                    $resultados_reales = DB::table('resultado_admins')
                                    ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                                    ->where('resultado_admins.id_quiniela','=',$id_quiniela)
                                    ->where('resultado_admins.fase','=',-11)
                                    ->where('resultado_admins.id_partido','=',$resultado->id_partido)
                                    ->select('resultado_admins.id_partido','resultado_admins.id_quiniela','resultado_admins.goles_local','resultado_admins.goles_visitante','partidos.id_local','partidos.id_visitante')                                 
                                    ->get();


                    {
                        
                        {  

                            // Resultado
                            if(($resultado->goles_local == $resultados_reales[0]->goles_local) and ($resultado->goles_visitante == $resultados_reales[0]->goles_visitante))
                            {
                                $puntos += 2;
                                $resultados += 1;
                            }
                                    
                            // Ganador Visitante
                            if(   (($resultado->goles_local - $resultado->goles_visitante) < 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) < 0 ) )
                            {

                                $puntos += 1;
                                $ganador += 1;
                            }

                            // Ganador Local
                            if(   (($resultado->goles_local - $resultado->goles_visitante) > 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) > 0 ) )
                            {

                                $puntos += 1;
                                $ganador += 1;
                            }

                            // Epate ---> igual es ganador
                            if(($resultado->goles_local - $resultado->goles_visitante == 0 ) and ($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante == 0 )) 
                            {

                                $puntos += 1;
                                $ganador += 1;
                            }
                        }
                    }
                    $i++;
                }
            }

            array_push($ranking, array($usuario->username,$usuario->id,$puntos,$ganador,$resultados));
        }

        for ($i=0; $i < count($ranking); $i++)
        { 
            for ($j=$i; $j < count($ranking); $j++)
            { 
                if($ranking[$i][2] < $ranking[$j][2])
                {
                    $aux = $ranking[$i];
                    $ranking[$i] = $ranking[$j];
                    $ranking[$j] = $aux;
                }
            }
        }

        $quiniela = DB::table('quinielas')
                      ->where('id','=',$id_quiniela)
                      ->select('quinielas.nombre')
                      ->get();

       return view('user.verQuinielaLiga',compact('ranking','quiniela'));
    }

  public function verMiQuiniela()
    {

        $ranking = array();
        $aaa = 'Inscrito';

        $id_quiniela = ($_GET['id']);
        $usuarios = DB::table('user_quinielas')
                         ->where('user_quinielas.status','=',$aaa)
                         ->select('user_quinielas.id','user_quinielas.username')
                         ->get();

        
        foreach ($usuarios as $usuario)
        {
            
            
            $puntos = 0;
            $equipos = 0;
            $puntos_equipos = 0;
            $equipos_cuartos = 0;
            $puntos_equipos_cuartos = 0;
            $equipos_semi = 0;
            $puntos_equipos_semi = 0;            
            $equipos_final = 0;
            $puntos_equipos_final = 0;
            $puntos_campeon = 0;
            $resultados = 0;
            $ganador = 0;

            for ($i=-1; $i < 6; $i++) 
            {
                
                $resultados_usuarios = DB::table('pronosticos')
                                    ->join('user_quinielas','user_quinielas.id','=','pronosticos.id_user')
                                    ->where('pronosticos.id_user','=',$usuario->id)
                                    ->where('pronosticos.fase','=',$i)
                                    ->select('pronosticos.id_partido','pronosticos.id_quiniela','pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user')                                 
                                    ->get();
                

                if (!empty($resultados_usuarios))
                {
                        foreach ($resultados_usuarios as $resultado)
                        {   
                           
                            $equi_loc = substr($resultado->id_partido, 0, 3);
                            $equi_vis = substr($resultado->id_partido, 3, 5);

                            if($i == -1)
                            {
                                 $equipos_octavos_local = DB::table('partidos')
                                            ->join('equipos','equipos.id_equipo','=','partidos.id_local')
                                            ->where('partidos.id_quiniela','=',$id_quiniela)
                                            ->where('partidos.fase_grupo','=',2)
                                            ->select('equipos.nombre')                                 
                                            ->get();

                                $equipos_octavos_visitante = DB::table('partidos')
                                            ->join('equipos','equipos.id_equipo','=','partidos.id_visitante')
                                            ->where('partidos.id_quiniela','=',$id_quiniela)
                                            ->where('partidos.fase_grupo','=',2)
                                            ->select('equipos.nombre')                                 
                                            ->get();

                            }
                            if ($i == 0 or $i == 1) 
                            {
                               $resultados_reales = DB::table('resultado_admins')
                                            ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                                            ->where('resultado_admins.id_quiniela','=',$id_quiniela)
                                            ->where('resultado_admins.id_partido','=',$resultado->id_partido)
                                            ->where('resultado_admins.fase','=',$i)
                                            ->select('resultado_admins.id_partido','resultado_admins.id_quiniela','resultado_admins.goles_local','resultado_admins.goles_visitante','partidos.id_local','partidos.id_visitante')                                 
                                            ->get();
                            }
                            elseif ($i == 2 or $i == 3 or $i == 4 or $i == 5 )
                            {
                                $resultados_reales = DB::table('resultado_admins')
                                            ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                                            ->where('resultado_admins.id_quiniela','=',$id_quiniela)
                                            ->where('resultado_admins.fase','=',$i)
                                            ->select('resultado_admins.id_partido','resultado_admins.id_quiniela','resultado_admins.goles_local','resultado_admins.goles_visitante','partidos.id_local','partidos.id_visitante')                                 
                                            ->get();

                                $equipos_octavos_local = DB::table('partidos')
                                            ->where('partidos.id_quiniela','=',$id_quiniela)
                                            ->where('partidos.fase_grupo','=',$i+1)
                                            ->select('partidos.id_local')                                 
                                            ->get();

                                $equipos_octavos_visitante = DB::table('partidos')
                                            ->where('partidos.id_quiniela','=',$id_quiniela)
                                            ->where('partidos.fase_grupo','=',$i+1)
                                            ->select('partidos.id_visitante')                                 
                                            ->get();
                            }
                            
                            // Calculando los puntos de los equipos que pasan a las siguientes fases

                             // Cuartos
                            if($i==2)
                            {
                                foreach ($equipos_octavos_local as $local) 
                                    {
                                        if (($equi_loc == $local->id_local)) 
                                        {
                                            $puntos += 4;
                                            $equipos_cuartos += 1;
                                            $puntos_equipos_cuartos += 4;
                                        }
                                    }

                                    foreach ($equipos_octavos_visitante as $visitante) 
                                    {
                                        if (($equi_vis == $visitante->id_visitante)) 
                                        {
                                            $puntos += 4;
                                            $equipos_cuartos += 1;
                                            $puntos_equipos_cuartos += 4;
                                        }
                                    }
                            }
                            // Semifinal
                            if($i==3)
                            {
                                foreach ($equipos_octavos_local as $local) 
                                    {
                                        if (($equi_loc == $local->id_local)) 
                                        {
                                            $puntos += 6;
                                            $equipos_semi += 1;
                                            $puntos_equipos_semi += 6;
                                        }
                                    }

                                    foreach ($equipos_octavos_visitante as $visitante) 
                                    {
                                        if (($equi_vis == $visitante->id_visitante)) 
                                        {
                                            $puntos += 6;
                                            $equipos_semi += 1;
                                            $puntos_equipos_semi += 6;
                                        }
                                    }
                            }
                            // Final
                            if($i==4)
                            {
                                foreach ($equipos_octavos_local as $local) 
                                    {
                                        if (($equi_loc == $local->id_local)) 
                                        {
                                            $puntos += 8;
                                            $equipos_final += 1;
                                            $puntos_equipos_final += 8;
                                        }
                                    }

                                    foreach ($equipos_octavos_visitante as $visitante) 
                                    {
                                        if (($equi_vis == $visitante->id_visitante)) 
                                        {
                                            $puntos += 8;
                                            $equipos_final += 1;
                                            $puntos_equipos_final += 8;
                                        }
                                    }
                            }
                            // Campeon
                            if($i == 5)
                            {

                                $equipos_octavos_local = DB::table('partidos')
                                            ->join('equipos','equipos.id_equipo','=','partidos.id_local')
                                            ->where('partidos.id_quiniela','=',$id_quiniela)
                                            ->where('partidos.fase_grupo','=',6)
                                            ->select('equipos.nombre','equipos.id_equipo')                                 
                                            ->get();



                                foreach ($equipos_octavos_local as $local) 
                                    {
                                        if (($resultado->id_partido == $local->id_equipo)) 
                                        {
                                           $puntos += 15;
                                           $puntos_campeon = 15;

                                        }
                                    }
                            }

                            

                            // Equipos que el usuario acerto en octavos
                            if($i == -1)
                            {
                                    foreach ($equipos_octavos_visitante as $local) 
                                    {
                                        if (($resultado->id_partido == $local->nombre)) 
                                        {
                                           $puntos += 2;
                                           $puntos_equipos += 2;
                                           $equipos += 1;
                                        }
                                    }

                                    foreach ($equipos_octavos_local as $visitante) 
                                    {
                                        if (($resultado->id_partido == $visitante->nombre)) 
                                        {
                                           $puntos += 2;
                                           $puntos_equipos += 2;
                                           $equipos += 1;
                                        }
                                    }
                            }
   

                            if(!empty($resultados_reales))
                            {

                                if($i == 0)
                                {
                                    // Resultado
                                    if(($resultado->goles_local == $resultados_reales[0]->goles_local) and ($resultado->goles_visitante == $resultados_reales[0]->goles_visitante))
                                    {
                                        $puntos += 3;
                                        $resultados += 1;
                                    }
                                    
                                    // Ganador
                                    elseif(   (($resultado->goles_local - $resultado->goles_visitante) < 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) < 0 ) )
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }

                                    // Ganador
                                    elseif(   (($resultado->goles_local - $resultado->goles_visitante) > 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) > 0 ) )
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }

                                    // Epate ---> igual es ganador
                                    elseif((($resultado->goles_local - $resultado->goles_visitante) == 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) ==0 )) 
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }
                                }
                                // 8vos
                                elseif($i == 1)
                                {
                                    // Resultado
                                    if(($resultado->goles_local == $resultados_reales[0]->goles_local) and ($resultado->goles_visitante == $resultados_reales[0]->goles_visitante))
                                    {
                                        $puntos += 3;
                                        $resultados += 1;
                                    }
                                    
                                    // Ganador
                                    if(   (($resultado->goles_local - $resultado->goles_visitante) < 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) < 0 ) )
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }

                                    // Ganador
                                    elseif(   (($resultado->goles_local - $resultado->goles_visitante) > 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) > 0 ) )
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }

                                    // Epate ---> igual es ganador
                                    elseif((($resultado->goles_local - $resultado->goles_visitante) == 0 ) and (($resultados_reales[0]->goles_local - $resultados_reales[0]->goles_visitante) ==0 )) 
                                    {
                                        $puntos += 1;
                                        $ganador += 1;
                                    }
                                }
                                // 4tos
                                elseif($i == 2)
                                {

                                    
                                    
                                    foreach ($resultados_reales as $resultados_admin) 
                                    {

                                        // Resultado
                                        if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 and ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                        {
                                            if(($resultado->goles_local == $resultados_admin->goles_local and $resultado->goles_visitante == $resultados_admin->goles_visitante)
                                                   or  ($resultado->goles_local == $resultados_admin->goles_visitante and $resultado->goles_visitante == $resultados_admin->goles_local ))
                                            {

                                                $puntos += 3;
                                                $resultados += 1;
                                            }
                                            
                                        }
                                        
                                        // Ganador Visitante
                                        if(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante < 0 ) and 
                                                (($resultado->goles_local - $resultado->goles_visitante) < 0  ))
                                        { 
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                            or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis)) 
                                            { 

                                               

                                                $puntos += 1;
                                                $ganador += 1;
                                            }
                                        }

                                        // Ganador Local
                                        elseif(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante > 0 ) 
                                                    and ( ($resultado->goles_local - $resultado->goles_visitante) > 0 ))
                                        { 

                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            { 
                                                
                                                
                                                $puntos += 1;
                                                $ganador += 1;

                                            }
                                        }

                                        // Epate ---> igual es ganador
                                        elseif((($resultados_admin->goles_local - $resultados_admin->goles_visitante) == 0 ) and (($resultado->goles_local - $resultado->goles_visitante) ==0 )) 
                                        {
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            {
                                                $puntos += 1;
                                                $ganador += 1;

                                            }
                                        }
                                    }    

                                }
                                // Semifinal
                                elseif($i == 3)
                                {
                                    foreach ($resultados_reales as $resultados_admin) 
                                    {

                                        // Resultado
                                        if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 and ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                        {
                                            if(($resultado->goles_local == $resultados_admin->goles_local and $resultado->goles_visitante == $resultados_admin->goles_visitante)
                                                   or  ($resultado->goles_local == $resultados_admin->goles_visitante and $resultado->goles_visitante == $resultados_admin->goles_local ))
                                            {
                                                $puntos += 3;
                                                $resultados += 1;
                                            }
                                            
                                        }
                                        
                                        // Ganador Visitante
                                        if(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante < 0 ) and 
                                                (($resultado->goles_local - $resultado->goles_visitante) < 0 or ($resultado->goles_local - $resultado->goles_visitante) > 0) )
                                        { 
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                            or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis)) 
                                            { 
                                                $puntos += 1;
                                                $ganador += 1;
                                            }
                                        }

                                        // Ganador Local
                                        elseif(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante > 0 ) 
                                                    and ( ($resultado->goles_local - $resultado->goles_visitante) > 0  or ($resultado->goles_local - $resultado->goles_visitante < 0)))
                                        { 

                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            { 
                                                $puntos += 1;
                                                $ganador += 1;

                                            }
                                        }

                                        // Epate ---> igual es ganador
                                        elseif((($resultados_admin->goles_local - $resultados_admin->goles_visitante) == 0 ) and (($resultado->goles_local - $resultado->goles_visitante) ==0 )) 
                                        {
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            {
                                                $puntos += 1;
                                                $ganador += 1;

                                            }
                                        }
                                    }                
                                }

                                // Final
                                elseif($i == 4)
                                { 


                                    foreach ($resultados_reales as $resultados_admin) 
                                    {

                                        // Resultado
                                        if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 and ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                        {
                                            if(($resultado->goles_local == $resultados_admin->goles_local and $resultado->goles_visitante == $resultados_admin->goles_visitante)
                                                   or  ($resultado->goles_local == $resultados_admin->goles_visitante and $resultado->goles_visitante == $resultados_admin->goles_local ))
                                            {
                                                $puntos += 3;
                                                $resultados += 1;
                                            }
                                            
                                        }
                                        
                                        // Ganador Visitante
                                        if(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante < 0 ) and 
                                                (($resultado->goles_local - $resultado->goles_visitante) < 0 or ($resultado->goles_local - $resultado->goles_visitante) > 0) )
                                        { 
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                            or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis)) 
                                            { 
                                                $puntos += 1;
                                                $ganador += 1;
                                            }
                                        }

                                        // Ganador Local
                                        elseif(   ($resultados_admin->goles_local - $resultados_admin->goles_visitante > 0 ) 
                                                    and ( ($resultado->goles_local - $resultado->goles_visitante) > 0  or ($resultado->goles_local - $resultado->goles_visitante < 0)))
                                        { 

                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            { 
                                                $puntos += 1;
                                                $ganador += 1;

                                            }
                                        }

                                        // Epate ---> igual es ganador
                                        elseif((($resultados_admin->goles_local - $resultados_admin->goles_visitante) == 0 ) and (($resultado->goles_local - $resultado->goles_visitante) ==0 )) 
                                        {
                                            if( ($resultados_admin->id_local == $equi_loc or $resultados_admin->id_local == $equi_vis)
                                                 or ($resultados_admin->id_visitante == $equi_loc or $resultados_admin->id_visitante == $equi_vis))
                                            {
                                                $puntos += 1 ;
                                                $ganador += 1;

                                            }
                                        }
                                    }    
                                }                                
                            }
                        } 
                       
                }
            }

            array_push($ranking, array($usuario->username,$puntos,$usuario->id,$ganador,$resultados,$puntos_equipos,$equipos,$puntos_equipos_cuartos,$equipos_cuartos,$puntos_equipos_semi,$equipos_semi,$puntos_equipos_final,$equipos_final,$puntos_campeon));
        }


        $quiniela = DB::table('quinielas')
                      ->where('id','=',$id_quiniela)
                      ->first();


        for ($i=0; $i < count($ranking); $i++)
        { 
            for ($j=$i; $j < count($ranking); $j++)
            { 
                if($ranking[$i][1] < $ranking[$j][1])
                {
                    $aux = $ranking[$i];
                    $ranking[$i] = $ranking[$j];
                    $ranking[$j] = $aux;
                }
            }
        }
        return view('user.verQuiniela',compact('ranking','quiniela'));
    }
}
