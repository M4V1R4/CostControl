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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
       
        $id = auth()->user()->id;
        $MisCategoriasl= MisCategorias::All();
        $MisCategoriasl = MisCategorias::where('user_id', $id)->get();
        $padre=MisCategorias::pluck('id','categoriaP');
        $sub=MisCategorias::pluck('id','subcategoria');
        return view('misCategorias.categorias', compact('MisCategoriasl','padre','sub'));
        
         
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

        $MisCategorias = new MisCategorias;
        $MisCategorias->user_id = auth()->user()->id;
        $MisCategorias->categoriaP = $request->categoriaP;
        $MisCategorias->subcategoria =$request->subcategoria;
        $MisCategorias->save();
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
     * @param  \App\Colas  $Colas0
     * @return \Illuminate\Http\Response
     */
    public function edit(MisCategorias $miscategoriasl)

    {    
        return view('misCategorias.edit',compact('miscategoriasl'));
    }

  
    public function update(Request $request, MisCategorias $miscategoriasl)
    {
        $miscategoriasl->update($request->all());
       
        
        return redirect()->route('misCategorias.index');
        
       
    }

   
    public function destroy(MisCategorias $miscategorias)

    {   $miscategorias->delete();     
     
        return back();
    }
}
