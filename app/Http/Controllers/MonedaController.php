<?php

namespace App\Http\Controllers;
use App\Moneda;
use Illuminate\Http\Request;
Use App;
use App\Http\Controllers\Auth;



class MonedaController extends Controller
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
    public function index() {

        
        $id = auth()->user()->id;
        $monedasl =Moneda::All();
        $monedasl = Moneda::where('user_id', $id)->get();
        return view('monedas', compact('monedasl'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        $nuevoMoneda = new Moneda;
        $nuevoMoneda->nombre = $request->nombre;
        $nuevoMoneda->user_id = auth()->user()->id;
        $nuevoMoneda->simbolo = $request->simbolo;
        $nuevoMoneda->descripcion =$request->descripcion;
        $nuevoMoneda->tasa =$request->tasa;
        $nuevoMoneda->save();
        return back();
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $Moneda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $Moneda)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        $moneda->update($request->all());
        return back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colas  $Colas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $Moneda)
    {
        $Moneda->delete();
        return back();
    }
}

