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
    {}
        
    
    public function index1()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte1' ,compact('cuentas'));
    }
    public function index2()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte2' ,compact('cuentas'));
    }
    public function index3()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte3' ,compact('cuentas'));
    }
    public function index4()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte4' ,compact('cuentas'));
    }
    public function index5()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte5' ,compact('cuentas'));
    }
    public function index6()
    {
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte6' ,compact('cuentas'));
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
