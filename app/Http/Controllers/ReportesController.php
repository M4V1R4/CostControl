<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Http\Controllers\Auth;
class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reportes' ,compact('cuentas'));
    }

    public function reporte1(Cuenta $cuenta){
        echo 'Holaaa';
        echo $cuenta;
        /*$cuenta = Cuenta::where('id', $id)->get();

        foreach( $cuenta as $key ){
            $saldo= $key->saldoInicial;
  
        }
        return $saldo;*/

    }
}
