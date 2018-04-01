<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibrosController extends Controller
{

    /**
     * Display a listing of the resource.
     * Mostrando los datos de los libros almacenados en la base de datos
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros=Libro::orderBy('id','DESC')->paginate(3);
        return view('libros.index',['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario de creacion de un nuevo libro en la base de datos
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     * 1. Valida que los campos que se ingresen en el formulario no esten vacios
     * 2. almacena el la base de datos el nuevo libro creado
     * 3. Redirige al usuario a la pantalla principal con un mensaje de exito
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nombre'=>'required',
            'resumen'=>'required',
            'npagina'=>'required',
            'edicion'=>'required',
            'autor'=>'required',
            'npagina'=>'required',
            'precio'=>'required'
        ]);
        Libro::create($request->all());
        return redirect()->route('libros.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     * Muestra los detalles de un libro
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libros=Libro::find($id);
        return  view('libros.show',compact('libros'));
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
        $libro=libro::find($id);
        return view('libros.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);

        libro::find($id)->update($request->all());
        return redirect()->route('libros.index')->with('success','Registro actualizado satisfactoriamente');

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
        Libro::find($id)->delete();
        return redirect()->route('libros.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
