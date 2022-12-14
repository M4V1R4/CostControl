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
        $total;
    }
    public function index()
    {   
    }
    public function index1()
    {   $cuent = [];
        $id = auth()->user()->id;
        $cuentas =Cuenta::All();
        $cuentas=Cuenta::where('user_id', $id)->get();
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
        $total= Transaccion::whereMonth('fecha', '>=', $mfecha)->whereYear('fecha', '=', date('Y'))->sum('monto');
        $info =Transaccion::All();
        $info =Transaccion::where('user_id', $id)->whereMonth('fecha', '>=', $mfecha)->whereYear('fecha', '=', date('Y'))->get();
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
        $info =[];
        
        return view('reportes.reporte5' ,compact('info'));
    }
    public function index6()
    {
        $info =[];
        return view('reportes.reporte6' ,compact('info'));
    }
    public function index7(){
        $info =Transaccion::All();
        $info=Transaccion::pluck('categoria','monto');
        //SELECT categoria, count(*) FROM transaccions GROUP BY categoria
        $info=Transaccion::pluck('categoria');
        //return response(json_encode($info),200)->header('content-type','text/plain');
        return view('reportes.graph',compact('info'));
        
    }


    public function show1(Request $request){

        $id = auth()->user()->id;

        $cuent = Cuenta::where('id', $request->cuenta)->where('user_id', $id)->get();
        $id = auth()->user()->id;
        $cuentas =Cuenta::All();
        $cuentas=Cuenta::where('user_id', $id)->get();

        return view('reportes.reporte1' ,compact('cuent','cuentas'));

    }
    public function show2(Request $request){
        $id = auth()->user()->id;
        $total= DB::table('transaccions')->where('user_id', $id)->whereBetween('fecha', array($request->fecha1, $request->fecha2))->sum('monto');
        if($total == 0 ){
            $info = [];
            return view('reportes.reporte2' ,compact('total','info'));
        }
        else{
        $info =Transaccion::All();
        $info=Transaccion::select('id','tipo','monto','fecha','categoria','detalle')->where('user_id', $id)->whereBetween('fecha', array($request->fecha1, $request->fecha2))->get();
        return view('reportes.reporte2' ,compact('total','info'));
        }
       

    }
    public function show5(Request $request){
        
        

        $mfecha = $request->mes;
        
        $id = auth()->user()->id;
        $total= Transaccion::whereMonth('fecha', '=',$mfecha)->where('user_id', $id)->sum('monto');
        if($total == 0 ){
            $info = [];
            return view('reportes.reporte5' ,compact('total','info'));
        }
        else{
        $info =Transaccion::All();
        $info =Transaccion::where('user_id', $id)->whereMonth('fecha', '=', $mfecha)->get();
        return view('reportes.reporte5' ,compact('info','total'));
        }

        
        

    }
    public function show6(Request $request){

        $yfecha = $request->anno;
        $id = auth()->user()->id;
        $total= Transaccion::where('user_id', $id)->whereYear('fecha', '=',$yfecha)->sum('monto');
        if($total == 0 ){
            $info = [];
            return view('reportes.reporte6' ,compact('total','info'));
        }
        else{
        $info =Transaccion::All();
        $info =Transaccion::where('user_id', $id)->whereYear('fecha', '=', $yfecha)->get();
        return view('reportes.reporte6' ,compact('total','info'));
        }
        

    }


}
