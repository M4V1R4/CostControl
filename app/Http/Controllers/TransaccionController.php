<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Transaccion;
use App\Cuenta;
Use App;
use App\Categoria;
use App\Http\Controllers\Auth;

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
        Transaccion::destroy($id);
        return back();
    }
    
    public function show(Transaccion $Moneda)
    {
        //
    }
    
    public function store(Request $request)
    {

        if($request->tipo == 'Gasto'){
            echo 'Gasto';
        }
        elseif($request->tipo == 'Ingreso'){
            echo 'Ingreso';
        }
        elseif($request->categoria == 'Traslado'){}
        $now = new \DateTime();
        $transacciones = new Transaccion;
        $transacciones->user_id = auth()->user()->id;
        $transacciones->tipo = $request->tipo;
        $transacciones->fecha = $now;
        $transacciones->cuenta =$request->cuenta;
        $transacciones->categoria =$request->categoria;
        $transacciones->detalle =$request->detalle;
        $transacciones->monto =$request->monto;
        $transacciones->save();
        return back();
                        
    }
 

    public function edit($id)
    {    
        $transacc = Transaccion::find($id);
        $padre=Categoria::pluck('id','catPadre');
        $sub=Categoria::pluck('id','descripcion');
        $cuentas=Cuenta::pluck('id','nombre');
        return view('transaccions.edit', compact('transacc','padre','sub','cuentas'));
    }

  
    public function update(Request $request, Transaccion $transacc)
    {
        $transacc->update($request->all());
        return redirect()->route('transaccions.index');
        
       
    }  
}
