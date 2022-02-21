<?php
// ho spostato l'home controller dentro la cartella admin quindi dovrò cambiare il namespace aggiungendo admin
namespace App\Http\Controllers\Admin;

// bisogna importare il controller
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // COSTRUTTORE che posso anche eliminare perchè ho messo l'home controller all'interno del gruppo di rotte che hanno già il middleware('auth'). 
    // public function __construct()
    // {
    //     // VERIFICA SE CHI FA LA RICHIESTA E'AUTENTICATO (LOGGATO)
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
