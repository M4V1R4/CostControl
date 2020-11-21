<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MisCategorias;
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
        return view('misCategorias.categorias', compact('MisCategoriasl'));
        
         
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
        $MisCategorias->tipo = $request->tipo;
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
    public function edit(Cuenta $cuenta)

    {    
        return view('misCategorias.edit',compact('MisCategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisCategorias $MisCategorias)
    {
        $MisCategorias->update($request->all());
       
        
        return redirect()->route('misCategorias.index');
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisCategorias $MisCategorias)
    {
        $MisCategorias->delete();
        return back();
    }
}
