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
   public function __construct()
    {   
       $this->middleware('admin', ['only' => ['index', 'create','edit','updadte','destroy']]);
    }
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

    public function agregar(Request $request)
    {
    
        $id_quiniela= session()->get('id_q1');
        return view('partido.agregar',compact('id_quiniela'));
    }

    public function agregar_directo(Request $request)
    {
    
        $id_quiniela= session()->get('id_q1');
        return view('partido.agregar_directo',compact('id_quiniela'));
    }

    public function partido_directo(Request $request)
    {
    
        
        $id_quiniela= session()->get('id_q1');

        if (!empty($request['equipo_a']) and !empty($request['equipo_b']) and !empty($request['fecha']))
        {

           

            $equipo_a = DB::table('equipos')->select('equipos.id_equipo')
                                             ->where('equipos.nombre','=', $request['equipo_a'])
                                             ->get();

            $equipo_b = DB::table('equipos')->select('equipos.id_equipo')
                                             ->where('equipos.nombre','=', $request['equipo_b'])
                                             ->get();

            Partido::create([
                'id_partido'=> $equipo_a[0]->id_equipo.$equipo_b[0]->id_equipo.$request['fecha'],
                'id_quiniela'=> $id_quiniela,
                'id_local'=> $equipo_a[0]->id_equipo,
                'id_visitante'=> $equipo_b[0]->id_equipo,
                'nom_local'=> $request['equipo_a'],
                'nom_visitante'=> $request['equipo_b'],
                'fecha'=> $request['fecha'],
                'fase_grupo'=> -10,
                 ]);

            Session::flash('message','Partidos creados exitosamente');
            return Redirect::to('/partido');
        }
        
        else
        {
            Session::flash('message','No se pudieron crear los partidos');
            return Redirect::to('/partido');
        }

        
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

        for ($j = 0; $j <= 5; $j++) {

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
        Session::flash('message','Partidos creados exitosamente');
        return Redirect::to('/partido');
    }


     public function guardarpartido(Request $request)
    {
        $id_quiniela = session()->get('id_q1');

        $local = $request['id_local'];
        $visitante = $request['id_visitante'];
        $fecha = $request['fecha'];
        $fase = $request['fase'];

                Partido::create([
                'id_partido'=> $local.$visitante,
                'id_quiniela'=> $id_quiniela,
                'id_local'=> $local,
                'id_visitante'=> $visitante,
                'fecha'=> $fecha,
                'fase_grupo'=> $fase,
                 ]);
 
        Session::flash('message','Partido creado exitosamente');
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
