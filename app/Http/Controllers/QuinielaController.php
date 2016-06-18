<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use Session;
use Redirect;
use Carbon\Carbon;
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
        $quinielas = Quiniela::paginate(8);
        $username = Auth::user()->username;
        $user_quinielas = DB::table('user_quinielas')->where('username','=',$username)->get();
        return view('user.showQuinielas',compact('quinielas'));
    }

    

    public function store(Request $request)
    {
        Quiniela::create([
            'nombre'=> $request['nombre'],
            'costo'=> $request['costo'],
            'usuarios'=> $request['usuarios'],
            'ganadores'=> $request['ganadores'],
            'f_inicio'=> $request['f_inicio'],
            'f_oferta'=> $request['f_oferta'],
            'f_inscripcion'=> $request['f_inscripcion'],
            'torneo_liga'=> $request['torneo_liga'],
            ]);
    
        Session::flash('message','Quiniela creada exitosamente');
        return Redirect::to('/quiniela');
        //return "Usuario Registrado";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $quiniela = Quiniela::find($id);
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
    public function update($id, Request $request)
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

    public function verMiQuiniela(Request $request){
         $id_quiniela = ($_GET['id']); 
        

        $puntuaciones = DB::table('puntuaciones')->join('user_quinielas','puntuaciones.id_user','=','user_quinielas.id')
                                            ->where('puntuaciones.id_quiniela','=',$id_quiniela)
                                            ->select('user_quinielas.username','puntuaciones.ptos','puntuaciones.ganadores','puntuaciones.resultados')
                                            ->orderBy('puntuaciones.ptos', 'desc')
                                            ->get();

        return view('user.verMiQuiniela',compact('puntuaciones'));
    }
}
