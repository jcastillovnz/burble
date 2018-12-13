<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionController extends Controller
{
    //




   public function index()
    {

        return view('gestiones');


    }



  public function createUser( Request $request)
    {

 

dd($request->all());



    }










}
