<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\UserQuiniela;
use quiniela\UserTransaccion;
use quiniela\Quiniela;

use quiniela\Http\Controllers\Controller;
use quiniela\Http\Controllers\UsertrasaccionController;
use Session;
use Redirect;
use Auth;
use View;
use App;
use DB;
use Mail;

class UserquinielaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
       $this->middleware('admin', ['only' => ['destroy','generarPDF','enviarPDF']]);
    }
   
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
        $id_quiniela = session()->get('id_qf');
        $user = session()->get('user');
        session()->forget('id_qf');
        session()->forget('user');


        UserQuiniela::create([
            'id_quiniela'=> $id_quiniela,
            'username'=> $user->username,
            'status'=> 'En proceso',
        ]);

        Session::flash('message-success','Inscripción correcta');
        return Redirect::to('/showQuinielas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return "0"; 

    }

    public function showUsersQuiniela()
    {
        $id_quin = $_GET['id_quin'];
        $users = UserQuiniela::paginate(100);
        return view('quiniela.showUsersQuiniela',compact('users'),compact('id_quin'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function misQuinielas()
    {
        $username = Auth::user()->username;

        $quinielas = DB::table('quinielas')->join('user_quinielas','quinielas.id','=','user_quinielas.id_quiniela')
                                            ->where('user_quinielas.username','=', $username)
                                            ->select('quinielas.nombre','quinielas.fecha_inicio','quinielas.ganadores', 'quinielas.costo', 'quinielas.tipo_quiniela','user_quinielas.status','user_quinielas.id_quiniela','user_quinielas.id')
                                            ->get();
       
        return view('user.showMisQuinielas',compact('quinielas'));
    }


    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserQuiniela::find($id);
        return view('quiniela.user.edit',compact('user'));
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

        $users = UserQuiniela::find($id);
        $id_quin = $users->id_quiniela;

        $users->fill($request->all());
        $users->save();
        
        Session::flash('message-success','Usuario Actualizado Correctamente');
        return Redirect::to('/showUsersQuiniela?id_quin='.$id_quin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = UserQuiniela::find($id);
        $id_quin = $users->id_quiniela;

        UserQuiniela::destroy($id);
        
        Session::flash('message-success','Usuario Eliminado Correctamente');
        return Redirect::to('/showUsersQuiniela?id_quin='.$id_quin);
    }

    public function generarPDF()
    {
        $id_quiniela = ($_GET['id_quiniela']);
  
        $jugadas = DB::table('pronosticos')
                    ->join('partidos','partidos.id_partido','=','pronosticos.id_partido')
                    ->where('pronosticos.id_quiniela','=',$id_quiniela)
                    ->where('pronosticos.fase','=','-10')
                    ->where('partidos.fase_grupo','=','-10')
                    ->select('pronosticos.id_pronostico','pronosticos.goles_local','pronosticos.goles_visitante','partidos.id_local','pronosticos.id_user','partidos.id_visitante')
                    ->get();

        



        $quiniela = DB::table('quinielas')->where('id',$id_quiniela)->select('nombre')->get();


        
        $equipos = DB::table('partidos')
                                    ->where('id_quiniela','=',$id_quiniela)
                                    ->select('partidos.nom_local','partidos.nom_visitante')->get();

        
        $view = View::make('pdf.allJugadas',compact('jugadas','equipos','id_quiniela','quiniela'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('allJugadas.pfd');
    }

     public function enviarPDF(){
        $id_quiniela = $_GET['id_q'];

       
        Mail::queue('emails.allJugadas',compact('id_quiniela'), function($msj){
        
        $id_quiniela = $_GET['id_q'];
        $users = DB::table('user_quinielas')
                        ->where('user_quinielas.id_quiniela',$id_quiniela)
                        ->where('status','Inscrito')->get();

        $quiniela = DB::table('quinielas')->where('id',$id_quiniela)->select('nombre')->get();
        $correos = array();
        $count = 0;

        foreach ($users as $user) {
            
            $correos[$count] = DB::table('users')->where('username',$user->username)->select('email')->get();
            $count++;
        }

        foreach ($correos as $correo) {
                $msj->subject('Quiniela '.$quiniela[0]->nombre);
                $msj->to($correo[0]->email);
                
        } 

            $msj->attach('/home/amontero/Imágenes/allJugadas.pdf');
        });

        Session::flash('message-success','Mensaje enviado correctamente');
        return Redirect::to('/showUsersRegistered');
    }
}