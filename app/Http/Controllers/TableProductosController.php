<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TableProductos;
use App\TableCliente;
use tableProductos1\http\Request\TableProductosRequest;

class TableProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre =$request->get('nombre');
        $tableProducto = TableProductos::orderBy('id','DESC')->nombre($nombre)->paginate(30);
        return view('tableProductos.index',compact('tableProducto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('tableProductos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
        $this->validate($request,[

           'nombreProductos',
           'preciosProductos',
           'descripcionProductos',
           'cantidadProductos',
           'preciocompraProductos'
        ]);
        
        TableProductos::create($request->all());*/


        $tableProducto = new TableProductos;
        $tableProducto->nombreProductos = $request->get('nombreProductos');
        $tableProducto->preciosProductos = $request->get('preciosProductos');
        $tableProducto->descripcionProductos = $request->get('descripcionProductos');
        $tableProducto->cantidadProductos = $request->get('cantidadProductos');
        $tableProducto->preciocompraProductos = $request->get('preciocompraProductos');
        $tableProducto->Difererencia = ($tableProducto->preciosProductos-$tableProducto->preciocompraProductos);
        $tableProducto->save();

        return redirect()->route('tableProductos.create')->with('success','Producto guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tableProducto = TableProductos::find($id);
      return view('tableProductos.show',compact('tableProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tableProducto = TableProductos::find($id);
        return view('tableProductos.edit',compact('tableProducto'));
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
        
        $tableProducto = TableProductos::find($id);

        $tableProducto->nombreProductos = $request->get('nombreProductos');
        $tableProducto->preciosProductos = $request->get('preciosProductos');
        $tableProducto->descripcionProductos = $request->get('descripcionProductos');
        $tableProducto->cantidadProductos = $request->get('cantidadProductos');
        $tableProducto->preciocompraProductos = $request->get('preciocompraProductos');
        $tableProducto->Difererencia = ($tableProducto->preciosProductos-$tableProducto->preciocompraProductos);
        $tableProducto->update();

        
        return redirect()->route('tableProductos.index')->with('success','Producto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TableProductos::find($id)->delete();
        return redirect()->route('tableProductos.index')->with('success','Producto eliminado con exito');
    }
}
 