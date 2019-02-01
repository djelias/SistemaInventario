<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use user1\http\Request\UserRequest;

class UserController extends Controller
{
     public function index(Request $request)
    {
        $users= User::orderBy('id','DESC')->paginate(10);
        return view('auth.index',compact('users'));
    }

    public function show($id)
    {
        $users = User::find($id);
      return view('auth.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::find($id);
        return view('auth.edit',compact('users'));
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
            'name' => 'required|alpha_spaces',
            'usuario' => 'required|alpha_spaces',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado con exito');
    }
}
