<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TableProductos;
use App\TableCompras;
use App\TableCliente;
use App\TableFacturasc;
use tableCompras1\http\Request\TableComprasRequest;

class TableComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre =$request->get('nombre');
        $tableFacturasc = TableFacturasc::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('tableCompras.index',compact('tableFacturasc'));
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
        $facturac = TableFacturasc::all();
        $compras = TableCompras::all();
        return view('tableCompras.create', compact('personas', 'productos', 'facturac', 'compras'));
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
        $factura = new TableFacturasc;
        $factura->id_proveedor = $request->get('id_proveedor'); 
        $factura->fecha = $request->get('fecha');
        $factura->estado = $request->get('estado');
        $factura->notaEnvio = $request->get('notaEnvio');
        $factura->save();


        $id_facturac=$factura->id;
        $Productos = $request->get('Productos');
        $cantidad = $request->get('cantidad');

        $total = 0;
        $totalf = 0;
        $cant = 0;
        $cont = 0;
        while ($cont < count($Productos)) {
            $compra = new TableCompras;
            $compra->id_facturascs = $id_facturac;
            $compra->id_productos = $Productos[$cont];
            $compra->cantidad = $cantidad[$cont];
            $compra->notaEnvio = $request->get('notaEnvio');
            $compra->save();

            $pro = TableProductos::find($Productos[$cont]);
            $total = ($pro->preciocompraProductos*$cantidad[$cont]);
            $totalf = ($totalf + $total);

            $cant = ($pro->cantidadProductos + $cantidad[$cont]);
            $pro->cantidadProductos = $cant;
            $pro->save();

            $cont = $cont + 1;
        }
        $factura->totals = $totalf;
        $factura->save();

        //$factura->totals = $totalf;
        
        return redirect()->route('tableCompras.create')->with('success','Compra guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tableCli = TableCliente::all();
        $tableCompras = TableCompras::all();
        $tableFacturasc = TableFacturasc::all();
        return view('tableCompras.detalle',compact('tableCompras','tableFacturasc','tableCli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tableCompras = TableCompras::find($id);
        return view('tableCompras.edit',compact('tableCompras'));
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
            'id_productos',
            'cantidad',
            'notaEnvio',
        ]);
        TableCompras::find($id)->update($request->all());
        return redirect()->route('tableCompras.index')->with('success','Compra actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facturac=TableFacturasc::find($id);
        $facturac->estado="Cancelado";
        $facturac->save();
        return redirect()->route('tableCompras.detalle');

    }

    public function visible($id)
    {
        $facturac=TableFacturasc::find($id);
        $facturac->visible="0";
        $facturac->save();
        return redirect()->route('tableCompras.index');

    }

    public function detalle()
    {
        $tableCli = TableCliente::all();
        $tableCompras = TableCompras::all();
        $tableFacturasc = TableFacturasc::all();
        $tableProductos = TableProductos::all();
        return view('tableCompras.detalle',compact('tableCompras','tableProductos','tableFacturasc','tableCli'));
    }
}
 