<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']= Usuario::paginate(10);


        return view('usuario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usuario.create');
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
       // $datosUsuario = request()->all();
       $campos=[
           'Nombre'=>'required|string|max:20',
           'Apellido'=>'required|string|max:20',
           'Edad'=>'required|string|max:2',
           'Correo'=>'required|email|max:30',
           'Clave'=>'required|string|min:6',
       ];

       $mensaje=[
           'required' => 'El :attribute es requerido',
           'Edad.required'=>'La Edad es Requerida',
           'Clave.required'=>'La Clave es Requerida',
           'Nombre.max'=> 'Nombre Máximo 20 carácteres',
           'Apellido.max'=> 'Apellido Máximo 20 carácteres',
           'Edad.max'=> 'Edad Máximo 2 cifras',
           'Correo.max'=> 'Correo Máximo 30 carácteres',
           'Correo.email'=> 'Correo debe tener un formato válido',
           'Clave.min'=> 'Clave Mínimo 6 carácteres',

       ];


       $this->validate($request,$campos,$mensaje);






        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);


        //return  response()->json($datosUsuario);


        return redirect('usuario')->with('mensaje','Usuario Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit',compact('usuario'));

        return redirect('usuario')->with('mensaje','Usuario Editado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:20',
            'Apellido'=>'required|string|max:20',
            'Edad'=>'required|string|max:2',
            'Correo'=>'required|email|max:30',
            'Clave'=>'required|string|min:6',
        ];

        $mensaje=[
            'required' => 'El :attribute es requerido',
            'Edad.required'=>'La Edad es Requerida',
            'Clave.required'=>'La Clave es Requerida',
            'Nombre.max'=> 'Nombre Máximo 20 carácteres',
            'Apellido.max'=> 'Apellido Máximo 20 carácteres',
            'Edad.max'=> 'Edad Máximo 2 caracteres',
            'Correo.max'=> 'Correo Máximo 30 carácteres',
            'Correo.email'=> 'Correo debe tener un formato válido',
            'Clave.min'=> 'Clave Mínimo 6 carácteres',

        ];


        $this->validate($request,$campos,$mensaje);



        $datosUsuario = request()->except(['_token','_method']);
        Usuario::where('id','=',$id)->update($datosUsuario);

        $usuario=Usuario::findOrFail($id);
       // return view('usuario.edit',compact('usuario'));



        return redirect('usuario')->with('mensaje','Usuario Editado Correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


        Usuario::destroy($id);
        Alert::success('Success Title', 'Success Message');
        return  redirect('usuario')->with('mensaje','Usuario Borrado Correctamente');
    }
}
