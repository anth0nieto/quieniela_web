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
use DB;

class UserquinielaController extends Controller
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
                                            ->select('quinielas.nombre','quinielas.f_inicio','quinielas.ganadores',               'user_quinielas.status','quinielas.id')
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
}
