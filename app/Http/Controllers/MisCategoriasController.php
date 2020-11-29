<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MisCategorias;
use App\Categoria;
Use App;
use App\Http\Controllers\Auth;

class MisCategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        $id = auth()->user()->id;
        $miscategoriasl= MisCategorias::All();
        $miscategoriasl = MisCategorias::where('user_id', $id)->get();
        $padre=MisCategorias::pluck('id','categoriaP');
        $sub=MisCategorias::pluck('id','subcategoria');
        return view('misCategorias.categorias', compact('miscategoriasl','padre','sub'));
        
         
    } 
   
    public function store(Request $request)
    {

        $MisCategorias = new MisCategorias;
        $MisCategorias->user_id = auth()->user()->id;
        $MisCategorias->categoriaP = $request->categoriaP;
        $MisCategorias->subcategoria =$request->subcategoria;
        $MisCategorias->save();
        return back();
                        
    }
 

    public function edit(MisCategorias $miscatego)

    {    
        return view('misCategorias.edit',compact('miscatego'));
    }

  
    public function update(Request $request, MisCategorias $miscatego)
    {
        $miscatego->update($request->all());
       
        
        return redirect()->route('misCategorias.index');
        
       
    }

   
    public function destroy(MisCategorias $miscatego)
    {   
        $miscatego->delete();
        return back();  
        
    }
}
