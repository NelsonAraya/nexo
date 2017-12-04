<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nexo;
use App\Usuario;

class NexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n = Nexo::orderBy('id','DESC')->paginate(10);
        return view('nexo.index')->with('nexos',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nexo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nexo = new Nexo($request->all());
        $usu = Usuario::where('rol',$request->rol)->get();
        $nexo->usuario_id=$usu[0]->id;
        $nexo->estado='A';
        $nexo->save();
        flash('Nexo Creado Correctamente')->success();
        return redirect()->route('nexo.index');
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
        $n= Nexo::find($id);
        return view ('nexo.edit')->with('nexo',$n);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usuario(Request $request, $id)
    {
        dd($request->all());
    }

    public function busqueda(Request $request){

        $search = $request->term;
        $usu = Usuario::where('nombres','LIKE','%'.$search.'%')->get();
       
        $data = [];

        foreach ($usu as $key => $value) {
            $data [] = ['id'=> $value->id, 'value'=> $value->nombres];       
        }
        return response()->json($data);

    }


}
