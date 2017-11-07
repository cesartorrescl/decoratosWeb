<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Producto;
use App\Inventario;
use App\Venta;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$productos = DB::table('productos')
            ->join('inventarios', 'productos.id', '=', 'inventarios.producto_id')
            ->get();

        return view('ventas.index')->with('productos',$productos);
            //dd($productos);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $total =0;
        $largo = $request->all();
		$i = count($largo);
		$i = intval($i/6);    
	
		if($largo["codigo1"]!=0){
		for ($j = 1; $j <= $i; $j++) {
			$total = $total+  $largo["subtotal".$j]; 
			
		}
		
		DB::table('ventas')->insert(['monto_total' => $total, "created_at" =>  \Carbon\Carbon::now(), 
				"updated_at" => \Carbon\Carbon::now()]);
		}
		$ventas =  Venta::all();

		for ($j = 1; $j <= $i; $j++) {
			$prod = DB::table('productos')->where('codigo', '=', $largo["codigo".$j])->get();
			DB::table('ventas_productos')->insert(['producto_id' => $prod[0]->id,'venta_id' => $ventas->last()->id,'cantidad' => $largo["cantidad".$j], "created_at" =>  \Carbon\Carbon::now(), 
				"updated_at" => \Carbon\Carbon::now()]);

			$inv  = DB::table('inventarios')->where('producto_id', '=', $prod[0]->id)->get();

			$compra = $inv[0]->precio_total_compra - $largo["cantidad".$j]*$prod[0]->precio_compra;
			$venta = $inv[0]->precio_total_venta - $largo["cantidad".$j]*$prod[0]->precio_venta;
			$cantidad = $inv[0]->cantidad - $largo["cantidad".$j];
			DB::table('inventarios')
            			->where('producto_id', '=', $prod[0]->id)
            			->update(['cantidad' => $cantidad, 
				'precio_total_compra' => $compra,'precio_total_venta' => $venta, 
          			"updated_at" => \Carbon\Carbon::now()]);
		
			
		}

		$productos = DB::table('productos')
            ->join('inventarios', 'productos.id', '=', 'inventarios.producto_id')
            ->get();
		//dd($ventas->last()->id);
        return view('ventas.index')->with('productos',$productos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}