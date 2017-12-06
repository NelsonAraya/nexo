<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nexo;
use App\Usuario;
use App\Asistencia;
use App\Grupo;
use App\Observacion;

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
        $usu = Usuario::where('rol',$request->rol)->first();
        $nexo->usuario_id=$usu->id;
        $nexo->estado='A';
        $nexo->save();
        
        $obs = new Observacion();
        $obs->obs="Nexo Creado por ".$usu->NombreSimple();
        $obs->nexo_id= $nexo->id;
        $obs->save();

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
        $obs = Observacion::where('nexo_id',$id)->orderBy('id','DESC')->get();
        return view ('nexo.edit')
                    ->with('nexo',$n)
                    ->with('obs',$obs);
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
        $nexo = Nexo::Find($id);
        $nexo->obac=$request->obac_cia;
        $nexo->obac_cbi=$request->obac_cbi;
        $nexo->save();

        $obs = new Observacion();
        $obs->obs="Nexo Actualizado";
        $obs->nexo_id= $id;
        $obs->save();

        return redirect()->route('nexo.edit',$id);

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
        $asis = new Asistencia();
        $asis->nexo_id=$id;
        $asis->usuario_id=$request->vol;
        $asis->estado_id=1;
        $asis->save();

        $usu = Usuario::find($request->vol);
        $obs = new Observacion();
        $obs->obs="Asistencia Registrada ".$usu->NombreSimple();
        $obs->nexo_id= $id;
        $obs->save();

        return redirect()->route('nexo.edit',$id)
                    ->with('modal_asis',1);

    }

    public function busqueda(Request $request){

        $search = $request->term;
        $usu = Usuario::where('nombres','LIKE','%'.$search.'%')->get();
       
        $data = [];

        foreach ($usu as $key => $value) {
            $value->nombres = $value->NombreSimple(); 
            $data [] = ['id'=> $value->id, 'value'=> $value->nombres];       
        }
        return response()->json($data);

    }

    public function busquedaActivo(Request $request){

        $search = $request->term;
        $usu = Asistencia::join('usuarios','asistencias.usuario_id','=','usuarios.id')
                ->select('usuarios.*')->where('asistencias.estado_id',1)
                ->where('usuarios.nombres','LIKE','%'.$search.'%')->get();
       
        $data = [];

        foreach ($usu as $key => $value) {
           // $value->nombres = $value->NombreSimple(); 
            $data [] = ['id'=> $value->id, 'value'=> $value->nombres];       
        }
        return response()->json($data);

    }


    public function voluntarios($id){
        
        $asistencia = Asistencia::where('nexo_id',$id)->get();
        foreach ($asistencia as $row) {
            $row->usuario->nombres=$row->usuario->NombreSimple();
            $row->estado;
        }
        return response()->json($asistencia);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function grupo(Request $request, $id)
    {
        
        $grupo = new Grupo();
        $grupo->nombre=$request->team;
        $grupo->funcion=$request->funcion;
        $grupo->obac=$request->obacteam;
        $grupo->nexo_id=$id;
        $grupo->estado_id=1;
        $grupo->save();

        $asis = Asistencia::where('usuario_id',$request->obacteam)->where('nexo_id',$id)->first();
        $asis->estado_id=2;
        $asis->save();

        $obs = new Observacion();
        $obs->obs="Grupo ".$grupo->nombre." creado FUNCION ".$grupo->funcion;
        $obs->nexo_id= $id;
        $obs->save();


        return redirect()->route('nexo.edit',$id)
                    ->with('modal_grupo',1);
    }

    public function gruponexo($id){
        
        $grupo = Grupo::where('nexo_id',$id)->get();
        foreach ($grupo as $row) {
            $row->usuario->nombres=$row->usuario->NombreSimple();
            $row->estado;
        }
        return response()->json($grupo);

    }
    
    public function observacion(Request $request, $id){
       
       $obs = New Observacion($request->all());
       $obs->nexo_id=$id;
       $obs->save();

        return redirect()->route('nexo.edit',$id);
    }

    public function busquedaNexo(Request $request,$id){

        $search = $request->term;
        $usu = Asistencia::join('usuarios','asistencias.usuario_id','=','usuarios.id')
                ->select('usuarios.*')->where('asistencias.nexo_id',$id)
                ->where('usuarios.nombres','LIKE','%'.$search.'%')->get();
       
        $data = [];

        foreach ($usu as $key => $value) {
           // $value->nombres = $value->NombreSimple(); 
            $data [] = ['id'=> $value->id, 'value'=> $value->nombres];       
        }
        return response()->json($data);

    }

    public function finalizar($id){

        $nexo=Nexo::Find($id);
        $nexo->estado='T';
        $nexo->save();

        $obs = new Observacion();
        $obs->obs="Nexo Finalizado";
        $obs->nexo_id= $id;
        $obs->save();

        return redirect()->route('home');
    }

}
