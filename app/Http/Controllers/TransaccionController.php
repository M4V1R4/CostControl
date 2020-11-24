<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaccione;
use App\Cuenta;
Use App;
use App\Categoria;
use Carbon\Carbon;
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
        $transaccionesl= Transaccione::All();
        $transaccionesl = Transaccione::where('user_id', $id)->get();
        $padre=Categoria::pluck('id','catPadre');
        $sub=Categoria::pluck('id','descripcion');
        $cuentas=Cuenta::pluck('id','nombre');
        return view('transacciones.transacciones', compact('transaccionesl','padre','sub','cuentas'));
        
         
    } 
   
    public function store(Request $request)
    {
        

        $transacciones = new Transaccione;
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
 

    public function edit(Transaccione $transacc)

    {    
        return view('transacciones.edit',compact('transacc'));
    }

  
    public function update(Request $request, Transaccione $transacc)
    {
        $transacc->update($request->all());
       
        
        return redirect()->route('transacciones.index');
        
       
    }

   
    public function destroy(Transaccione $transacc)
    {   
        $transacc->delete();
        return back();  
        
    }
}
