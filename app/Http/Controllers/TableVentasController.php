<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TableProductos;
use App\TableVentas;
use App\TableCompras;
use App\TableCliente;
use App\TableFacturas;
use tableVentas1\http\Request\TableVentasRequest;

class TableVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre =$request->get('nombre');
        $tableFactura = TableFacturas::orderBy('id','DESC')->nombre($nombre)->paginate(20);
        return view('tableVentas.index',compact('tableFactura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $personas = TableCliente::all();
        $productos = TableProductos::all();
        $factura = TableFacturas::all();
        $venta = TableVentas::all();
        return view('tableVentas.create', compact('personas', 'productos', 'factura', 'venta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    {
        /**$this->validate($request,[
            'No_Facturas',
            'Productos',
            'cantidad'

            factura= cliente, fecha, total
            Cliente= id
        ]);
        
        TableVentas::create($request->all());
        return redirect()->route('tableVentas.create')->with('success','Venta guardado con éxito');*/
        $factura = new TableFacturas;
        $factura->cliente = $request->get('cliente'); 
        $factura->fecha = $request->get('fecha');
        $factura->notaEnvio = $request->get('notaEnvio');
        $factura->save();

        $id_factura=$factura->id;
        $Productos = $request->get('Productos');
        $cantidad = $request->get('cantidad');

        $total = 0;
        $totalf = 0;
        $cant = 0;
        $cont = 0;
        while ($cont < count($Productos)) {
            $venta = new TableVentas;
            $venta->id_facturas = $id_factura;
            $venta->id_productos = $Productos[$cont];
            $venta->cantidad = $cantidad[$cont];
            $venta->notaEnvio = $request->get('notaEnvio');
            $venta->save();

            $pro = TableProductos::find($Productos[$cont]);
            $total = ($pro->preciosProductos*$cantidad[$cont]);
            $totalf = ($totalf + $total);

            $cant = ($pro->cantidadProductos - $cantidad[$cont]);
            $pro->cantidadProductos = $cant;
            $pro->save();

            $cont = $cont + 1;
        }
        $factura->totals = $totalf;
        $factura->save();

        //$factura->totals = $totalf;
        
        return redirect()->route('tableVentas.create')->with('success','Venta guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $fecha = $request->get('fechainicial');
        $tableFacturas = TableFacturas::orderBy('id','DESC')->nombre($fecha)->paginate(80);
        $tableVentas = TableVentas::all();
        $tableProductos = TableProductos::all();
        $tableCompras = TableCompras::all();
        return view('tableVentas.show',compact('tableVentas','tableProductos','tableCompras','tableFacturas', 'tableVent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tableVenta = TableVentas::find($id);
        return view('tableVentas.edit',compact('tableVenta'));
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
        $this->validate($request,[
          'id_facturas',
            'id_productos',
            'cantidad'
        ]);
        TableVentas::find($id)->update($request->all());
        return redirect()->route('tableVentas.index')->with('success','Venta actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            TableVentas::find($id)->delete();
        return redirect()->route('tableVentas.index')->with('success','Venta eliminado con exito');
    } catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('tableVentas.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        
    }
    }

    public function detalle(Request $request)
    {
        $fechai =$request->get('fechainicial');
        $fechaf =$request->get('fechafinal');
        $fecha = TableFacturas::where("fecha",">=","$fechai")
         ->where("fecha","<=","$fechaf")
         ->get();
        $tableVentas = TableVentas::orderBy('id','DESC')->nombre($nombre)->paginate(20);
        $tableProductos = TableProductos::all();
        return view('tableVentas.detalle',compact('tableVentas','fecha','tableProductos'));
    }
}
 