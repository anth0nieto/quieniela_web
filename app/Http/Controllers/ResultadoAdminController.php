<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\ResultadoAdmin;
use Session;
use Redirect;
use DB;

class ResultadoAdminController extends Controller
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
        $resultados = DB::table('resultado_admins')
                    ->where('id_quiniela', '=', $id_quin)
                    ->get();

        return view('resultado_admin.index',compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resultado_admin.busqueda');
    }


    public function buscar(Request $request)
    {   

        $id_quin = session()->get('id_q1');
        $partidos = DB::table('partidos')
                ->where('fecha', '=', $request['fecha_result'])
                ->where('id_quiniela', '=', $id_quin)
                ->get();
        
        //Redirect::action('ResultadoAdminController@create',$partidos);
        
            // Arreglaaaaaaaaar

        if(count($partidos) !=0)
        {
           /* if(     DB::table('resultado_admins')
                    ->where('id_partido', '=', $partidos[0]->id_partido)
                    ->count() != count($partidos)    )*/
            {    
                return view('resultado_admin.create',compact('partidos'),compact('id_quin'));
            }
            /*else{
                Session::flash('message1','Resultados en esta fecha ya creados');
                return Redirect::to('resultado_A/create');
            }*/
        }else{
             Session::flash('message1','No Hay Partidos en esta Fecha!');
                return Redirect::to('resultado_A/create');   
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

        $contador = $request['contador'];;
        $id_quiniela = session()->get('id_q1');


        for ($i = 1; $i <= $contador; $i++)
        {
            $fase = DB::table('partidos')
                    ->select('fase_grupo')
                    ->where('id_partido', '=', $request['id_partido_'.$i])
                    ->get();

            $goles = DB::table('resultado_admins')
                    ->select('goles_visitante','goles_local')
                    ->where('id_partido', '=', $request['id_partido_'.$i])
                    ->get();
          
         
        if (!empty($goles[0]->goles_local) and !empty($goles[0]->goles_visitante)) // Si el partido ya existe se actualiza
        {
             DB::table('resultado_admins')
                     ->where('id_partido', $request['id_partido_'.$i])
                     ->update(
                           ['id_partido'=> $request['id_partido_'.$i],
                            'goles_visitante'=> $request['visitante_'.$i],
                            'goles_local'=> $request['local_'.$i],
                            'fase'=> ($fase[0]->fase_grupo - 1),
                            'id_quiniela'=> $id_quiniela]);

        }
           
        // De lo contrario se crea
        else
        {
            ResultadoAdmin::create([
                'id_partido'=> $request['id_partido_'.$i],
                'goles_visitante'=> $request['visitante_'.$i],
                'goles_local'=> $request['local_'.$i],
                'fase'=> ($fase[0]->fase_grupo - 1),
                'id_quiniela'=> $id_quiniela
            ]);
        }

                    
        }
          
        Session::flash('message','Resultados ingresados exitosamente');
        return Redirect::to('resultado_A');

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

        $partidos = DB::table('partidos')
                ->where('id_partido', '=', $id)
                ->get();

        $parti = ResultadoAdmin::find_resultado($id);

        return view('resultado_admin.edit',['parti'=>$parti],['partidos'=>$partidos[0]]);
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

      //  $partido = DB::table('resultado_admins')->where('id_partido', '=', $id)->select('goles_local','goles_visitante')->get();
        $partido = ResultadoAdmin::find_resultado($id);
        $partido->fill($request->all());
        $local = $request['goles_local'];
        $visitante = $request['goles_visitante'];


        DB::table('resultado_admins')->where('id_partido', $id)->update(
           ['goles_local'=> $local,
            'goles_visitante'=> $visitante,
            'fase'=> 0]);

        Session::flash('message','Resultado editado exitosamente');
        return Redirect::to('/resultado_A');
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
