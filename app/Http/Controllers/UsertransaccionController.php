<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;

use quiniela\UserQuiniela;
use quiniela\UserTransaccion;

use quiniela\Http\Controllers\Controller;
use quiniela\Http\Controllers\UsertrasaccionController;
use quiniela\Creditos;
use quiniela\Pago;
use Session;
use Redirect;
use DB;
use quiniela\Http\Requests\UsertransaccionRequest;
use quiniela\Http\Requests\CreditosRequest;

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
            'fecha' => date('Y-m-d', strtotime($request['fecha'])),
            'nro_transaccion'=>$request['nro_transaccion'],
        ]);

        
        return Redirect::action('UserquinielaController@create');
               
    }

    public function creditosTransaccion(CreditosRequest $request)
    {

        $creditos = New Creditos;

        $creditos->email = $request['user_email'];
        $creditos->creditoPendiente = $request['monto'];
        $creditos->ultimosCuatro = $request['cuantroUltimos'];
        $creditos->banco = $request['banco_emisor'];
        $creditos->status = 0;
        $creditos->fecha = date('Y-m-d', strtotime($request['fecha']));

        $creditos->save();

        $aux = new UserquinielaController;
        return $aux->misQuinielas();     
    }

    public function pagosTransaccion(Request $request)
    {

        $user = DB::table('users')
                    ->join('personas','personas.email','=','users.email')
                    ->where('users.username','=',$request['user_id_nombre'])
                    ->select('personas.email','personas.creditoDisponible')
                    ->get();
       
        if(empty($request['nombre_usuario']) || empty($request['banco_emisor']) || empty($request['cedula']) ||
            empty($request['nroCuenta']) || empty($request['monto']) || empty($request['fecha']) ||
             empty($request['email']) || empty($request['user_id_nombre']) || empty($request['montoMax']) ) 
        {
            $email =  $user[0]->email;

            $usuario = DB::table('personas')
                    ->where('personas.email','=',$email)
                    ->select('personas.creditoDisponible')
                    ->first();

            Session::flash('message-error','Debes llenar todos los campos');
            return view('user.solicitarPago',compact('email','usuario'));
        }   

        else
        {
            if($request['monto'] > $user[0]->creditoDisponible)
            {
                $email =  $user[0]->email;

                $usuario = DB::table('personas')
                        ->where('personas.email','=',$email)
                        ->select('personas.creditoDisponible')
                        ->first();

                Session::flash('message-error','Lo sentimos, no tienes suficientes creditos.');
                return view('user.solicitarPago',compact('email','usuario'));
            }
            else
            {
                $total = $user[0]->creditoDisponible-$request['monto'];

                DB::table('personas')
                    ->where('email', $user[0]->email)
                    ->update(array('creditoDisponible' => $total));

                $usuario = NULL;

                $pagos = New Pago;

                $pagos->nombre = $request['nombre_usuario'];
                $pagos->email = $request['email'];
                $pagos->cedula = $request['cedula'];
                $pagos->montoSolicitado = $request['monto'];
                $pagos->banco = $request['banco_emisor'];
                $pagos->nroCuenta = $request['nroCuenta'];
                $pagos->username = $request['user_id_nombre'];
                $pagos->status = 0;
                $pagos->fechaSolicitud = date('Y-m-d', strtotime($request['fecha']));

                $pagos->save();

                $aux = new UserController;
                Session::flash('message-success','Pago Solicitado con exito');
                return $aux->show($usuario);    
            }  
        }        
    }

    public function gestionCreditos()
    {
       
       $creditos = DB::table('creditos')
                    ->join('personas','personas.email','=','creditos.email')
                    ->where('creditos.status','=',0)
                    ->select('creditos.*','personas.nombre','personas.apellido')
                    ->get();

        return view('admin.creditos',compact('creditos'));       
    }

    public function gestionPagos()
    {
        
        $pagos = DB::table('pagos')
                    ->where('pagos.status','=',0)
                    ->select('pagos.*')
                    ->get();

        return view('admin.pagos',compact('pagos'));       
    }

    public function aprobarCredito(Request $request)
    {
        DB::table('creditos')
            ->where('id', $request['credito_id'])
            ->where('email', $request['user_email'])
            ->where('creditoPendiente', $request['monto'])
            ->where('ultimosCuatro', $request['ultimosCuatro'])
            ->update(array('status' => 1,
                            'fechaApro' => \Carbon\Carbon::now()->format('Y-m-d')));

       $usuario =  DB::table('personas')
                    ->where('email', $request['user_email'])
                    ->first();

        $total = $usuario->creditoDisponible+$request['monto'];
        
        DB::table('personas')
            ->where('email', $request['user_email'])
            ->update(array('creditoDisponible' => $total));

        
        Session::flash('message','Credito Aprobado Exitosamente');
        return $this->gestionCreditos();
    }

    public function aprobarPago(Request $request)
    {

        DB::table('pagos')
            ->where('id', $request['id_pago'])
            ->where('email', $request['user_email'])
            ->where('montoSolicitado', $request['monto'])
            ->where('fechaSolicitud', $request['fecha_pago'])
            ->update(array('status' => 1,
                            'fechaApro' => \Carbon\Carbon::now()->format('Y-m-d')));

       /*$usuario =  DB::table('personas')
                    ->where('email', $request['user_email'])
                    ->first();

        $total = $usuario->creditoDisponible-$request['monto'];
        
        DB::table('personas')
            ->where('email', $request['user_email'])
            ->update(array('creditoDisponible' => $total));
        */
        
        Session::flash('message','Pago Realizado Exitosamente');
        return $this->gestionPagos();
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
