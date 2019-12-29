<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TableProductos;
use App\TableVentas;
use App\TableFacturas;
use App\TableCliente;
use tableFacturas1\http\Request\TableFacturasRequest;

class TableFacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre =$request->get('nombre');
        $tableFacturas = TableFacturas::orderBy('id','DESC')->nombre($nombre)->paginate(30);
        return view('tableFacturas.index',compact('tableFacturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('tableFacturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'No_Facturas',
            'cliente',
            'fecha',
            'fechaPago',
            'totals',
            'notaEnvio'
        ]);
        
        TableFacturas::create($request->all());
        return redirect()->route('tableFacturas.create')->with('success','Factura guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tableFactura = TableFacturas::find($id);
      return view('tableFacturas.show',compact('tableFactura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tableFactura = TableFacturas::find($id);
        return view('tableFacturas.edit',compact('tableFactura'));
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
          'No_Facturas',
            'cliente',
            'fecha',
            'fechaPago',
            'totals',
            'notaEnvio'
        ]);
        TableFacturas::find($id)->update($request->all());
        return redirect()->route('tableVentas.pendientes')->with('success','Factura actualizado con exito');
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
            TableFacturas::find($id)->delete();
        return redirect()->route('tableFacturas.index')->with('success','Factura eliminado con exito');
    } catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('tableFacturas.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        
    }
    }
}
 