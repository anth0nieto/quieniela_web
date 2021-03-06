<?php
namespace quiniela\Http\Controllers;
use Illuminate\Http\Request;
use quiniela\Http\Requests;
use quiniela\Http\Controllers\Controller;
use Mail;
use Session;
use Redirect;
class MailController extends Controller
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
    public function store(Request $request)
    {
        Mail::send('emails.contact',$request->all(), function($msj){
            
        
            $msj->subject('Correo de Contacto');
            $msj->to('antho.montero@gmail.com');
            $msj->to('alvarolac2@gmail.com');
        });
        Session::flash('message','Mensahe enviado correctamente');
        return Redirect::to('contacto');
    }

    public function resetPassword(){
        return view('auth.password');
    }

    public function storePassword()
    {

        $name = ($_GET['name']);
        $email = ($_GET['email']);

        Mail::send('emails.password',compact('name','email'), function($msj){
            
            $email = ($_GET['email']);
            $msj->subject('Correo de Contacto');
            $msj->to($email);
            

        });
        Session::flash('message','Mensahe enviado correctamente');
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