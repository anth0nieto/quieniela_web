<?php

namespace quiniela\Http\Controllers;

use Illuminate\Http\Request;

use quiniela\Http\Requests;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('index');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function contacto()
    {
        return view('contacto');
    }
    
   
    public function destroy($id)
    {
        //
    }
}
