<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MisCategorias;
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
            $categoriasl =Categoria::All();
            $categoriasl = Categoria::where('user_id', $id)->get();
            $padre=Categoria::pluck('id','catPadre');
            $sub=Categoria::pluck('id','descripcion');
            return view('categorias.categorias', compact('categoriasl','padre','sub'));
            
             
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
            $v = \Validator::make($request->all(), [
            
                'presupuesto' => 'numeric|required|'
            ]);
    
            if ($v->fails())
            {
    
                return redirect()->back()->withInput()->withErrors($v->errors());
            }
            
            $id=0;
    
            $nuevoCategoria = new Categoria;
            $nuevoCategoria->tipo = $request->tipo;
            $nuevoCategoria->user_id = auth()->user()->id;
            $nuevoCategoria->catPadre = $request->catPadre;
            $nuevoCategoria->descripcion =$request->descripcion;
            $nuevoCategoria->presupuesto =$request->presupuesto;
            $nuevoCategoria->save();
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
        public function edit(Categoria $categoria)
    
        {   $padre=Categoria::pluck('id','catPadre');
            $sub=Categoria::pluck('id','descripcion');
            return view('categorias.edit', compact('categoria','padre','sub'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Categoria $categoria)
        {
            $categoria->update($request->all());
           
            
            return redirect()->route('categorias.index');
            
           
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Colas  $Colas
         * @return \Illuminate\Http\Response
         */
        public function destroy(Categoria $categoria)
        {
            $categoria->delete();
            return back();
        }
    
    
}
