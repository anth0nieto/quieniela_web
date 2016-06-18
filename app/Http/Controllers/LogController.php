<?php

namespace quiniela\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;

use quiniela\Http\Requests;
use quiniela\Http\Requests\LoginRequest;
use quiniela\Http\Controllers\Controller;

use quiniela\Admin;
use quiniela\User;
use DB;


class LogController extends Controller
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

    public function store(LoginRequest $request)
    {   

        $user = User::find($request->username);

        if(Auth::attempt(['username'=>$request['username'], 'password'=>$request['password']]))
        {
            
            if($request['username'] == "anth0nieto")
            {
                Session::flash('message-success','Bienvenido');
                return Redirect::to('admin');
            }

            Session::flash('message-success','Bienvenido');
            return Redirect::to('/showQuinielas');
            
        }

        else
        {
            Session::flash('message-error','Datos son incorrectos');
            return Redirect::to('/');
        }

        
             
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('message-success','Hasta Pronto...');
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
