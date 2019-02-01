<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TableCliente;
use App\User;
use tableCliente1\http\Request\TableClienteRequest;

class TableClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre =$request->get('nombre');
        $tableClientes = TableCliente::orderBy('id','DESC')->nombre($nombre)->paginate(30);
        return view('tableCliente.index',compact('tableClientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $users = User::all();
        return view('tableCliente.create', compact('users'));
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

           'idCliente',
          'Nombre_Cliente',
          'Apellido_Cliente',
          'razon_s_Cliente',
          'ruc_Cliente',
          'direccion_Cliente',
          'telefono_Cliente',
          'correo_Cliente'
        ]);
        
        TableCliente::create($request->all());
        return redirect()->route('tableCliente.index')->with('success','Cliente guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tableClient = TableCliente::find($id);
      return view('tableCliente.show',compact('tableClient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCliente)
    {
        $tableClientes = TableCliente::find($idCliente);
        return view('tableCliente.edit',compact('tableClientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCliente)
    {
        $this->validate($request,[
          'idCliente',
          'Nombre_Cliente',
          'Apellido_Cliente',
          'razon_s_Cliente',
          'ruc_Cliente',
          'direccion_Cliente',
          'telefono_Cliente',
          'correo_Cliente'
        ]);
        TableCliente::find($idCliente)->update($request->all());
        return redirect()->route('tableCliente.index')->with('success','Cliente actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCliente)
    {
        try{
            TableCliente::find($idCliente)->delete();
        return redirect()->route('tableCliente.index')->with('success','Cliente eliminado con exito');
    } catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('tableCliente.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        
    }
    }
}
 