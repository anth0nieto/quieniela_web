<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;
use quiniela\Http\Requests\AdminCreateRequest;
use quiniela\Http\Requests\AdminUpdateRequest;
use quiniela\Http\Requests\AdminLoginRequest;
use quiniela\Http\Controllers\Controller;
use quiniela\Admin;
use quiniela\User;
use Session;
use Redirect;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'create','edit','updadte','destroy']]);

    }

    public function index()
    {
        $admins = Admin::paginate(4);
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        User::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'cedula' => $request['cedula'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        Admin::create(['username' => $request['username'],]);

        Session::flash('message-success','Usuario creado exitosamente');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $admin = User::find($id);
        return view('admin.edit',['admin'=>$admin]);
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
        $admin = User::find($id);
        $admin->fill($request->all());
        $admin->fill($request->all());
         $admin->save();
         Session::flash('message-success','Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message-success','Usuario Eliminado Correctamente');
        return Redirect::to('/admin');
    }

   
}
