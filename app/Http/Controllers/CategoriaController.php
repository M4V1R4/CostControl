<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPadre;
use App\Categoria;
Use App;
use App\Http\Controllers\Auth;

class CategoriaController extends Controller
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
           
            $id = auth()->user()->id;
            //$monedanombre = Moneda::join('cuentas','cuentas.moneda_id','=','monedas.id')->select('monedas.id', 'monedas.nombre')->where('monedas.user_id', $id)->get();
            $cuentasl =Cuenta::All();
            $cuentasl = Cuenta::where('user_id', $id)->get();
            $monedas=Moneda::pluck('id','nombre');
            $monedasl =Moneda::All();
            $monedasl = Moneda::where('user_id', $id)->get();
            return view('cuentas.cuentas', compact('cuentasl','monedas','monedasl'));
            
             
        } 
        public function create()
        {
            
          
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            /**$id = auth()->user()->id;
            $file = $request->file('icono');
            $pic_name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/' . $id, $pic_name);
            $pic_route = $id . '/' . $pic_name;*/
            
    
            $nuevoCuenta = new Cuenta;
            $nuevoCuenta->nombre = $request->nombre;
            $nuevoCuenta->user_id = auth()->user()->id;
            $nuevoCuenta->moneda_id = $request->moneda_id;
            $nuevoCuenta->descripcion =$request->descripcion;
            $nuevoCuenta->saldoInicial =$request->saldoInicial;
            //$nuevoCuenta->icono = $pic_route;
            $nuevoCuenta->save();
            return back();
                            
        }
        
    
        /**
         * Display the specified resource.
         *
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function show(Cuenta $Moneda)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function edit(Cuenta $cuenta)
    
        {   $monedas=Moneda::pluck('id','nombre');
            return view('cuentas.edit',compact('cuenta','monedas'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Cuenta $cuenta)
        {
            $cuenta->update($request->all());
           
            
            return redirect()->route('cuentas.index');
            
           
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function destroy(Cuenta $cuenta)
        {
            $cuenta->delete();
            return back();
        }
    
    
}
