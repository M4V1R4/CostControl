<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Transaccion;
use App\Cuenta;
Use App;
use App\Categoria;
use App\Moneda;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;

class TransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        $id = auth()->user()->id;
        $transaccionesl= Transaccion::All();
        $transaccionesl = Transaccion::where('user_id', $id)->get();
        $padre=Categoria::pluck('id','catPadre');
        $sub=Categoria::pluck('id','descripcion');
        $cuentas=Cuenta::pluck('id','nombre');
        return view('transaccions.transaccions', compact('transaccionesl','padre','sub','cuentas'));
        
         
    } 
    public function destroy($id)
    {
        $idU = auth()->user()->id; 
        $transaccionesl = Transaccion::where('id', $id)->get();

        foreach( $transaccionesl as $key ){
            $nombre= $key->cuenta;
            $nombre2= $key->cuenta2;
            $monto= $key->monto;
            $tipo = $key->tipo;
        }

        if($tipo == 'Gasto'){

            $cuenta = Cuenta::where('nombre',$nombre)->increment('saldoInicial',$monto);
            Transaccion::destroy($id);
        }
        elseif($tipo == 'Ingreso'){

            $cuenta = Cuenta::where('nombre',$nombre)->decrement('saldoInicial',$monto);
            Transaccion::destroy($id);
        }
        elseif($tipo == 'Traslado'){

            $cuenta = Cuenta::where('nombre',$nombre)->decrement('saldoInicial',$monto);
            $cuenta = Cuenta::where('nombre',$nombre2)->increment('saldoInicial',$monto);
            Transaccion::destroy($id);
        }

        return back();
    }
    
    public function show(Transaccion $Moneda)
    {
        //
    }
    
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            
            'monto' => 'numeric|required|'
        ]);

        if ($v->fails())
        {

            return redirect()->back()->withInput()->withErrors($v->errors());
        }

       
        // $now = new \DateTime();
        $id = auth()->user()->id; 
        $cuenta = Cuenta::where('user_id', $id)->where('nombre',$request->cuenta)->get();
        foreach( $cuenta as $key ){
            $nombre= $key->nombre;
            
        }
        $cuenta2 = Cuenta::where('user_id', $id)->where('nombre',$request->cuenta2)->get();
        foreach( $cuenta2 as $key ){
            $nombre2= $key->nombre;
        
        }
        
        if($request->tipo == 'Gasto'){

            
            $cuenta = Cuenta::where('nombre',$nombre)->decrement('saldoInicial',$request->monto);
            $transacciones = new Transaccion;
            $transacciones->user_id = auth()->user()->id;
            $transacciones->tipo = 'Gasto';
            $transacciones->fecha = $request->fecha;
            $transacciones->cuenta =$request->cuenta;
            if($request->categoria == null){
                $transacciones->categoria = $request->subcategoria;
            }
            else{

                $transacciones->categoria =$request->categoria;
            }
            $transacciones->detalle =$request->detalle;
            $transacciones->monto =$request->monto;
            $transacciones->save();
            return back();
            
        }
        elseif($request->tipo == 'Ingreso'){

            $cuenta = Cuenta::where('nombre',$nombre)->increment('saldoInicial',$request->monto);
            $transacciones = new Transaccion;
            $transacciones->user_id = auth()->user()->id;
            $transacciones->tipo = 'Ingreso';
            $transacciones->fecha = $request->fecha;
            $transacciones->cuenta =$request->cuenta;
            if($request->categoria == null){
                $transacciones->categoria = $request->subcategoria;
            }
            else{

                $transacciones->categoria =$request->categoria;
            }
            $transacciones->detalle =$request->detalle;
            $transacciones->monto =$request->monto;
            $transacciones->save();
            return back();
            
        }
        elseif ($request->tipo == 'Traslado'){

            $cuenta1 = Cuenta::where('nombre',$nombre)->decrement('saldoInicial',$request->monto);

            $cuent2 =Cuenta::select('moneda_id')->where('nombre', $request->cuenta2)->get();
            $cuent1 =Cuenta::select('moneda_id')->where('nombre', $request->cuenta)->get();
            foreach($cuent2 as $cu2){
                $id_cuenta2 = $cu2->moneda_id;  
            }
            foreach($cuent1 as $cu1){
                $id_cuenta1 = $cu1->moneda_id;  
            }
            $tasa1 = Moneda::select('tasa')->where('id', $id_cuenta1)->get();
            foreach($tasa1 as $ts1){
                $tasaC1 = $ts1->tasa;  
            }
            $tasa2 = Moneda::select('tasa')->where('id', $id_cuenta2)->get();
            foreach($tasa2 as $ts2){
                $tasaC2 = $ts2->tasa;  
            }

            $montoFinal = $request->monto * $tasaC1 / $tasaC2;
            $cuenta2 = Cuenta::where('nombre',$nombre2)->increment('saldoInicial',$montoFinal);
            
            $transacciones = new Transaccion;
            $transacciones->user_id = auth()->user()->id;
            $transacciones->tipo = 'Ingreso';
            $transacciones->fecha = $request->fecha; 
            $transacciones->cuenta = $request->cuenta2;
            if($request->categoria == null){
                $transacciones->categoria = $request->subcategoria;
            }
            else{

                $transacciones->categoria =$request->categoria;
            }
            $transacciones->detalle =$request->detalle;
            $transacciones->monto =$montoFinal;
            // $transacciones->monto =$request->monto;
            $transacciones1 = new Transaccion;
            $transacciones1->user_id = auth()->user()->id;
            $transacciones1->tipo = 'Gasto';
            $transacciones1->fecha = $request->fecha;
            $transacciones1->cuenta =$request->cuenta;
            if($request->categoria == null){
                $transacciones1->categoria = $request->subcategoria;
            }
            else{

                $transacciones1->categoria =$request->categoria;
            }
            $transacciones1->detalle =$request->detalle;
            $transacciones1->monto =$request->monto;
            $transacciones1->save();
            $transacciones->save();
            return back();

        }
        
        
        
                        
    }
 

    public function edit($id)
    {    
        $transacc = Transaccion::find($id);
        $padre=Categoria::pluck('id','catPadre');
        $sub=Categoria::pluck('id','descripcion');
        $cuentas=Cuenta::pluck('id','nombre');
        return view('transaccions.edit', compact('transacc','padre','sub','cuentas'));
    }

  
    public function update(Request $request,$id)
    {    
        $idU = auth()->user()->id; 
        $transac = Transaccion::where('id', $id)->get();
        foreach( $transac as $key ){
            $monto= $key->monto;
        
        }
        $min = intval($request->get('monto') ) - intval($monto);
        
        if($request->get('tipo') == 'Gasto'){
            

            $cuenta = Cuenta::where('nombre',$request->get('cuenta'))->where('user_id', $idU)->decrement('saldoInicial',abs ($min));
            $transac = Transaccion::find($id);
            $transac->tipo = 'Gasto';
            $transac->fecha = $request->fecha;
            $transac->cuenta =$request->get('cuenta');
            if($request->get('categoria') == null){
                $transac->categoria = $request->get('subcategoria');
            }
            else{

                $transac->categoria =$request->get('categoria');
            }
            $transac->detalle =$request->get('detalle');
            $transac->monto =$request->get('monto');
            $transac->update();
            return redirect()->route('transaccions.index');
            
        }
        elseif($request->get('tipo') == 'Ingreso'){

            $cuenta = Cuenta::where('nombre',$request->get('cuenta'))->where('user_id', $idU)->increment('saldoInicial',abs ($min));
            $transac = Transaccion::find($id);
            $transac->tipo = 'Ingreso';
            $transac->fecha = $request->fecha;
            $transac->cuenta =$request->get('cuenta');
            if($request->categoria == null){
                $transac->categoria =$request->get('subcategoria');
            }
            else{

                $transac->categoria =$request->get('categoria');
            }
            $transac->detalle =$request->get('detalle');
            $transac->monto =$request->get('monto');
            $transac->update();
            return redirect()->route('transaccions.index');
            
        }
  
    }  
}
