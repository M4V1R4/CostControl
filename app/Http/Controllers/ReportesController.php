<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Transaccion;
use Carbon\Carbon;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $cuent;
        $info;
    }
    public function index()
    {   
        
      
    }
    public function index1()
    {   $cuent = [];
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte1' ,compact('cuentas','cuent'));
    }

    public function index2()
    {   $info =[];
        $cuentas=Cuenta::pluck('id','nombre');
        return view('reportes.reporte2' ,compact('cuentas','info'));
    }
    public function index3()
    {  
        $now = new \DateTime();
        $fecha = Carbon::parse($now);
        $mfecha = $fecha->month;
        $id = auth()->user()->id;
        $total= Transaccion::whereMonth('fecha', '>=', $mfecha)->sum('monto');
        $info =Transaccion::All();
        $info =Transaccion::where('user_id', $id)->whereMonth('fecha', '>=', $mfecha)->get();
        return view('reportes.reporte3' ,compact('info','total'));
    }
    public function index4()
    {
        $id = auth()->user()->id;
        $total= Transaccion::where('user_id', $id)->whereYear('fecha', '=', date('Y'))->sum('monto');
        $info =Transaccion::All();
        $info =Transaccion::where('user_id', $id)->whereYear('fecha', '=', date('Y'))->get();
        return view('reportes.reporte4' ,compact('info','total'));
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


    public function show1(Request $request){


        $cuent = Cuenta::where('id', $request->cuenta)->get();

        $cuentas=Cuenta::pluck('id','nombre');

        return view('reportes.reporte1' ,compact('cuent','cuentas'));

    }
    public function show2(Request $request){
        $id = auth()->user()->id;
        $total= DB::table('transaccions')->whereBetween('fecha', array($request->fecha1, $request->fecha2))->sum('monto');
        $info =Transaccion::All();
        $info=Transaccion::select('id','tipo','categoria','detalle')->where('user_id', $id)->get();
        return view('reportes.reporte2' ,compact('total','info'));

    }
    public function show5(Request $request){
        $id = auth()->user()->id;
        $total= DB::table('transaccions')->whereBetween('fecha', array($request->fecha1, $request->fecha2))->sum('monto');
        $info =Transaccion::All();
        $info=Transaccion::select('id','tipo','categoria','detalle')->where('user_id', $id)->get();
        return view('reportes.reporte2' ,compact('total','info'));

    }
    public function show6(Request $request){
        $id = auth()->user()->id;
        $total= DB::table('transaccions')->whereBetween('fecha', array($request->fecha1, $request->fecha2))->sum('monto');
        $info =Transaccion::All();
        $info=Transaccion::select('id','tipo','categoria','detalle')->where('user_id', $id)->get();
        return view('reportes.reporte2' ,compact('total','info'));

    }


}
