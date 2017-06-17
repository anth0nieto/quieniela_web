<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\Http\Requests\UserRequest;
use quiniela\Http\Controllers\Controller;
use quiniela\User;
use quiniela\Persona;
use quiniela\UserQuiniela;
use Session;
use Redirect;
use Schema;
use DB;
use View;
use App;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
    {   
       $this->middleware('admin',['only'=>'showUsersRegistered']);
    }
    public function index()
    {
        return view('ganadores');
    }

    public function showQuinielas()
    {
        $quinielas = Quiniela::paginate(8);

        return view('user.showQuinielas',compact('quinielas'));
    }

    public function getCreditos()
    {
        return view('user.obtenerCreditos');
    }

    public function getPago(Request $request)
    {
        $email =  $request['user_email'];

         $usuario = DB::table('personas')
                    ->where('personas.email','=',$email)
                    ->select('personas.creditoDisponible')
                    ->first();

        return view('user.solicitarPago',compact('email','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Persona::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'cedula' => $request['cedula'],
            'ubicacion'=>$request['ubicacion'],
            'email' => $request['email'],
            'fecha_nacimiento' => date('Y-m-d', strtotime($request['fecha_nacimiento'])),
            'telefono' => $request['telefono'],
            
        ]);

        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        Session::flash('message-success','Usuario creado exitosamente');
        return Redirect::to('/');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $username = Auth::user()->username;

        $micredito = 0;
        $mipago = 0;

        $usuario = DB::table('users')
                    ->join('personas','personas.email','=','users.email')
                    ->where('users.username','=',$username)
                    ->select('users.username','users.email', 'personas.*')
                    ->get();

        $creditoP = DB::table('creditos')
                    ->where('creditos.email','=',$usuario[0]->email)
                    ->where('creditos.status','=',0)
                    ->select('creditos.creditoPendiente')
                    ->get();

        foreach ($creditoP as $credito)
        {
            $micredito += $credito->creditoPendiente;
        }

        $pagoP = DB::table('pagos')
                    ->where('pagos.email','=',$usuario[0]->email)
                    ->where('pagos.status','=',0)
                    ->select('pagos.montoSolicitado')
                    ->get();

        foreach ($pagoP as $pago)
        {
            $mipago += $pago->montoSolicitado;
        }

        return view('user.cuenta', compact('usuario','micredito','mipago'));
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

    public function verPerfilLiga()
    {
        $id_user = ($_GET['id_user']);

        $user = DB::table('user_quinielas')
                ->where('id',$id_user)
                ->first();



        $user_name = DB::table('user_quinielas')
                ->where('id','=',$id_user)
                ->select('user_quinielas.username')
                ->get();

        

        $quiniela = DB::table('quinielas')
                ->where('id','=',$user->id_quiniela)
                ->first();

        $jugadas = DB::table('pronosticos')
                    ->join('partidos','partidos.id_partido','=','pronosticos.id_partido')
                    ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                    ->where('pronosticos.id_user','=',$id_user)
                    ->select('pronosticos.goles_local','pronosticos.goles_visitante','partidos.*')
                    ->get();

        for($i = 0; $i < count($jugadas); $i++)
        {
            $nombre_local[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_local)
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_visitante)
                                    ->select('equipos.nombre')->get();
        }

        $resultados = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->select('goles_local','goles_visitante','id_local','id_visitante','nom_local','nom_visitante')
                        ->get();

        if(count($resultados) > 0)
        {    
            for($i = 0; $i < count($resultados); $i++)
            {
                $resultado_local[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_local)
                                            ->select('equipos.nombre')
                                            ->get();

                $resultado_visitante[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            
            }
        } 



         return view('user.verPerfilLiga',compact('jugadas','nombre_local','nombre_visitante','resultado_local','resultado_visitante','resultados','quiniela','id_user','user_name'));
                                  
        

    }
   public function verPerfil()
    {

        $id_user = ($_GET['id_user']);
        
        $user = DB::table('user_quinielas')
                ->where('id',$id_user)
                ->first();

        $user_name = DB::table('user_quinielas')
                ->where('id','=',$id_user)
                ->get();

        // Equipos fase de grupo
        $jugadas = DB::table('pronosticos')
                    ->join('partidos','partidos.id_partido','=','pronosticos.id_partido')
                    ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                    ->where('pronosticos.id_user','=',$id_user)
                    ->where('pronosticos.fase','=',0)
                    ->where('partidos.fase_grupo','=',1)
                    ->select('pronosticos.goles_local','pronosticos.goles_visitante','partidos.id_local','pronosticos.id_user','partidos.id_visitante')
                    ->get();

        for($i = 0; $i < count($jugadas); $i++)
        {
            $nombre_local[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_local)
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_visitante)
                                    ->select('equipos.nombre')->get();
        }


        $resultados = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',1)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();



        if(count($resultados) > 0)
        {    
            for($i = 0; $i < count($resultados); $i++)
            {
                $resultado_local[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         }   

         $quiniela = DB::table('quinielas')
                         ->where('id','=',$user->id_quiniela)
                         ->first();
        //---------------------------------------

        // Equipos que estan en octavos
        $equipos_octavos_local = DB::table('partidos')
                                            ->join('equipos','equipos.id_equipo','=','partidos.id_local')
                                            ->where('partidos.id_quiniela','=',$user->id_quiniela)
                                            ->where('partidos.fase_grupo','=',2)
                                            ->select('equipos.nombre')                                 
                                            ->get();

        $equipos_octavos_visitante = DB::table('partidos')
                                            ->join('equipos','equipos.id_equipo','=','partidos.id_visitante')
                                            ->where('partidos.id_quiniela','=',$user->id_quiniela)
                                            ->where('partidos.fase_grupo','=',2)
                                            ->select('equipos.nombre')                                 
                                            ->get();

        $resultados_usuarios = DB::table('pronosticos')
                                    ->join('user_quinielas','user_quinielas.id','=','pronosticos.id_user')
                                    ->where('pronosticos.id_user','=',$user->id)
                                    ->where('pronosticos.fase','=',-1)
                                    ->select('pronosticos.id_partido','pronosticos.id_quiniela','pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user','user_quinielas.username')                                 
                                    ->get();
        //------------------------------------------
       
       // Equipos jugando 8vos de final

        $resultados_usuarios_8vos = DB::table('pronosticos')
                                ->join('partidos','partidos.id_partido','=','pronosticos.id_partido')
                                ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                                ->where('pronosticos.id_user','=',$id_user)
                                ->where('pronosticos.fase','=',1)
                                ->where('partidos.fase_grupo','=',2)
                                ->select('pronosticos.goles_local','pronosticos.goles_visitante','partidos.id_local','pronosticos.id_user','partidos.id_visitante')
                                ->get();

        for($i = 0; $i < count($resultados_usuarios_8vos); $i++)
        {
            $nombre_local_8vos[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$resultados_usuarios_8vos[$i]->id_local)
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante_8vos[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$resultados_usuarios_8vos[$i]->id_visitante)
                                    ->select('equipos.nombre')->get();
        }


        $resultados_8vos = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',2)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();


        if(count($resultados_8vos) > 0)
        {    
            for($i = 0; $i < count($resultados_8vos); $i++)
            {
                $resultado_local_8vos[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_8vos[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante_8vos[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_8vos[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         }   


        //-----------------------------------------

        // Equipos jugando 4tos de final
         $resultados_usuarios_4tos = DB::table('pronosticos')
                                ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                                ->where('pronosticos.id_user','=',$id_user)
                                ->where('pronosticos.fase','=',2)
                                ->select('pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user','pronosticos.id_partido')
                                ->get();

                            

        for($i = 0; $i < count($resultados_usuarios_4tos); $i++)
        {


            $nombre_local_4tos[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_4tos[$i]->id_partido, 0, 3))
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante_4tos[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_4tos[$i]->id_partido, 3, 5))
                                    ->select('equipos.nombre')->get();
        }

        $resultados_4tos = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',3)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();

        if(count($resultados_4tos) > 0)
        {    
            for($i = 0; $i < count($resultados_4tos); $i++)
            {
                $resultado_local_4tos[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_4tos[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante_4tos[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_4tos[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         }   
        //-----------------------------------------


        // Resultados semifinal

        $resultados_usuarios_semi = DB::table('pronosticos')
                                ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                                ->where('pronosticos.id_user','=',$id_user)
                                ->where('pronosticos.fase','=',3)
                                ->select('pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user','pronosticos.id_partido')
                                ->get();

                            

        for($i = 0; $i < count($resultados_usuarios_semi); $i++)
        {


            $nombre_local_semi[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_semi[$i]->id_partido, 0, 3))
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante_semi[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_semi[$i]->id_partido, 3, 5))
                                    ->select('equipos.nombre')->get();
        }

        $resultados_semi = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',4)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();

        if(count($resultados_semi) > 0)
        {    
            for($i = 0; $i < count($resultados_semi); $i++)
            {
                $resultado_local_semi[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_semi[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante_semi[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_semi[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         } 

        //-----------------------------------------

        // Resultados Final

         $resultados_usuarios_final = DB::table('pronosticos')
                                ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                                ->where('pronosticos.id_user','=',$id_user)
                                ->where('pronosticos.fase','=',4)
                                ->select('pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user','pronosticos.id_partido')
                                ->get();

                            

        for($i = 0; $i < count($resultados_usuarios_final); $i++)
        {


            $nombre_local_final[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_final[$i]->id_partido, 0, 3))
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante_final[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($resultados_usuarios_final[$i]->id_partido, 3, 5))
                                    ->select('equipos.nombre')->get();
        }

        $resultados_final = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',5)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();

        if(count($resultados_final) > 0)
        {    
            for($i = 0; $i < count($resultados_final); $i++)
            {
                $resultado_local_final[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_final[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante_final[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados_final[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         } 

        //-----------------------------------------

         // Campeon del torneto 

          $campeon_usuario = DB::table('pronosticos')
                                ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                                ->where('pronosticos.id_user','=',$id_user)
                                ->where('pronosticos.fase','=',5)
                                ->select('pronosticos.goles_local','pronosticos.goles_visitante','pronosticos.id_user','pronosticos.id_partido')
                                ->get();

                            

        for($i = 0; $i < count($campeon_usuario); $i++)
        {


            $nombre_local_campeon[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($campeon_usuario[$i]->id_partido, 0, 3))
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante_campeon[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',substr($campeon_usuario[$i]->id_partido, 3, 5))
                                    ->select('equipos.nombre')->get();
        }

        $campeon_final = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',6)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();

        if(count($campeon_final) > 0)
        {    
            for($i = 0; $i < count($campeon_final); $i++)
            {
                $resultado_local_campeon[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$campeon_final[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')
                                            ->get();

                $resultado_visitante_campeon[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$campeon_final[$i]->id_visitante)
                                            ->select('equipos.nombre')
                                            ->get();
            }
         } 
        //----------------------------------------
         
        return view('user.verPerfil',compact('jugadas','nombre_local','nombre_visitante','resultado_local','resultado_visitante','resultados','quiniela','equipos_octavos_local','equipos_octavos_visitante','resultados_usuarios','id_user','user_name',
                                   'resultados_usuarios_8vos','nombre_local_8vos','nombre_visitante_8vos','resultados_8vos','resultado_local_8vos','resultado_visitante_8vos',
                                   'resultados_usuarios_4tos','nombre_local_4tos','nombre_visitante_4tos','resultados_4tos','resultado_local_4tos','resultado_visitante_4tos',
                                   'resultados_usuarios_semi','nombre_local_semi','nombre_visitante_semi','resultados_semi','resultado_local_semi','resultado_visitante_semi',
                                   'resultados_usuarios_final','nombre_local_final','nombre_visitante_final','resultados_final','resultado_local_final','resultado_visitante_final',
                                   'campeon_usuario','nombre_local_campeon','nombre_visitante_campeon','campeon_final','resultado_local_campeon','resultado_visitante_campeon'));
    }


 public function miJugadaPDF(){
       $id_user = ($_GET['id_user']);

        $user = DB::table('user_quinielas')->where('id',$id_user)->first();
        $user_name = DB::table('user_quinielas')->where('id','=',$id_user)->get();
        
        $jugadas = DB::table('pronosticos')
                    ->join('partidos','partidos.id_partido','=','pronosticos.id_partido')
                    ->where('pronosticos.id_quiniela','=',$user->id_quiniela)
                    ->where('pronosticos.id_user','=',$id_user)
                    ->where('pronosticos.fase','=','-10')
                    ->where('partidos.fase_grupo','=','-10')
                    ->orderBy('pronosticos.id_user')
                    ->select('pronosticos.id_pronostico','pronosticos.goles_local','pronosticos.goles_visitante','partidos.id_local','pronosticos.id_user','partidos.id_visitante')
                    ->get();
      

        for($i = 0; $i < count($jugadas); $i++)
        {
            $nombre_local[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_local)
                                    ->select('equipos.nombre','equipos.grupo')->get();

            $nombre_visitante[$i] = DB::table('equipos')
                                    ->where('equipos.id_equipo','=',$jugadas[$i]->id_visitante)
                                    ->select('equipos.nombre')->get();
        }
      
        $resultados = DB::table('resultado_admins')
                        ->join('partidos','partidos.id_partido','=','resultado_admins.id_partido')
                        ->where('resultado_admins.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.id_quiniela','=',$user->id_quiniela)
                        ->where('partidos.fase_grupo','=',1)
                        ->select('goles_local','goles_visitante','id_local','id_visitante')
                        ->get();


      
        if(count($resultados) > 0)
        {    
            for($i = 0; $i < count($resultados); $i++)
            {
                $resultado_local[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_local)
                                            ->select('equipos.nombre','equipos.grupo')->get();

                $resultado_visitante[$i] = DB::table('equipos')
                                            ->where('equipos.id_equipo','=',$resultados[$i]->id_visitante)
                                            ->select('equipos.nombre')->get();
            }
         }   

         $quiniela = DB::table('quinielas')
                    ->where('id','=',$user->id_quiniela)
                    ->first();

    $user = DB::table('user_quinielas')->where('id','=',$id_user)->select('username')->get();

        
    
        $view = View::make('pdf.miJugada',compact('jugadas','nombre_local','nombre_visitante','resultado_local','resultado_visitante','resultados','quiniela','user_name'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('miJugada_'.$user[0]->username.'.pdf');
    }

    public function showUsersRegistered()
    {
        $id_quiniela = session()->get('id_q1');
        $users = Userquiniela::paginate(100);
        return view('quiniela.showUsersRegistered',compact('users'),compact('id_quiniela'));
    }

    public function comoJugar()
    {
        return view('user.comoJugar');
    }


}
