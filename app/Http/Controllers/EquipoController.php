<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;

use Session;
use Redirect;
use Carbon\Carbon;
use quiniela\Equipo;
use quiniela\Quiniela;
use DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $equipos = Equipo::paginate(1000);
         $id_quin = session()->get('id_q1');
        return view('equipo.index',compact('equipos'), compact('id_quin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $request['resultado'];
        $id_quiniela= session()->get('id_q1');
           return view('equipo.create', compact('id_quiniela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_quiniela = $request['id_quiniela_1'];
        
        for ($j = 1; $j <= 6; $j++) {
            $grupo_equipo = $request['id_grupo_'.$j];
            for ($i = 1; $i <= 4; $i++) {
                
                if($request['id_equipo_'.$i.$grupo_equipo] != NULL)
                {
                    Equipo::create([
                    'id_equipo'=> $request['id_equipo_'.$i.$grupo_equipo],
                    'id_quiniela'=> $id_quiniela,
                    'grupo'=> $grupo_equipo,
                    'nombre'=> $request['nombre_'.$i.$grupo_equipo],
                    ]);
                }
            }
        }  
        Session::flash('message','Grupos creados exitosamente');
        return Redirect::to('/equipo');
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



    public function constructor(Request $request)
    {
        $id_quiniela = ($_GET['resultado']);       
        session(['id_q1' => $id_quiniela]);
        return Redirect::to('/equipo'); 
                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        return view('equipo.edit',['equipo'=>$equipo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_equipo, Request $request)
    {
        $equipo = Equipo::find_equipo($id_equipo);
        $equipo->fill($request->all());
       
        $equipo->save();
        Session::flash('message','Equipo editado exitosamente');
        return Redirect::to('/equipo');
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
