<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Control;
use App\TableFacturasc;
use App\Facturas;
use App\Pagos;
use App\TableCliente;
use DB;
use control1\http\Request\ControlRequest;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = TableCliente::all();
        $fact = TableFacturasc::all();
        $total = Facturas::all();
        $control = DB::table('Table_Facturascs')->select('id_proveedor')->distinct()->get();
        return view('control.index',compact('control','cliente','fact','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $facturas = Facturas::all();
        return view('tableCliente.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    {
        $this->validate($request,[
            'id_proveedor',
            'fecha',
            'factura',
            'pertenece',
            'pago',
            'abono',
            'estado'

        ]);
        
        Facturas::create($request->all());
        return redirect()->route('control.index')->with('success','Factura guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
        $tableFacturasc = TableCliente::find($id);
        $tableFac = TableFacturasc::all();
        $reg = DB::table('facturas')
        ->join('pagos', 'pagos.id_proveedor', '=', 'facturas.id_proveedor')
        ->where('facturas.id_proveedor', '=', $id)
        ->get();
        $registros = $reg->sortByDesc('fecha');
        return view('control.show',compact('tableFacturasc','tableFac','registros'));*/
        $tableFacturasc = TableCliente::find($id);
        $facturas = DB::table('facturas')
        ->select('*')
        ->where('facturas.id_proveedor', '=', $id)
        ->get();
        $registros = $facturas->sortByDesc('fecha');
        return view('control.show',compact('facturas','registros','tableFacturasc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = TableCliente::find($id);
        return view('control.edit',compact('proveedor'));
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

    public function factura($id)
    {
        $cliente = TableCliente::find($id);
        $facturas = DB::table('facturas')
        ->select('*')
        ->where('facturas.id_proveedor', '=', $id)
        ->get();
        $registros = $facturas->sortByDesc('fecha');
        return view('control.factura',compact('facturas','registros','cliente'));
    }



    public function abono($id,$idf)
    {
        $cliente = TableCliente::find($id);
        $factur = Facturas::find($idf);
        $facturas = DB::table('facturas')
        ->select('*')
        ->where('facturas.id_proveedor', '=', $id)
        ->get();
        $registros = $facturas->sortByDesc('fecha');
        return view('control.abono',compact('facturas','registros','cliente','factur'));
    }

}
 