<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;

use quiniela\UserQuiniela;
use quiniela\UserTransaccion;

use quiniela\Http\Controllers\Controller;
use quiniela\Http\Controllers\UsertrasaccionController;
use Session;
use Redirect;
use quiniela\Http\Requests\UsertransaccionRequest;

class UsertransaccionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UsertransaccionRequest $request)
    {


        UserTransaccion::create([
            'id_quiniela' => session()->get('id_qf'),
            'username' => session()->get('user')->username,
            'tipo_transaccion' => $request['tipo_transaccion'],
            'banco_emisor' => $request['banco_emisor'],
            'nro_cuenta' => $request['nro_cuenta'],
            'monto' => $request['monto'],
            'fecha' => $request['fecha'],
            'nro_transaccion'=>$request['nro_transaccion'],
        ]);

        
        return Redirect::action('UserquinielaController@create');
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTransaccion()
    {
        $id_quin = $_GET['id_quin'];
        $username= $_GET['username'];
        $array_value = array('id_quin' => $id_quin,'username'=> $username);
        $transacciones = UserTransaccion::paginate(100);
        return view('quiniela.showTransaccion',compact('transacciones'),compact('array_value'));
   
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
