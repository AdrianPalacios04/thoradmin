<?php

namespace App\Http\Controllers;

use App\Models\Acertijo;
use Illuminate\Http\Request;

class AcertijoController extends Controller
{
    
    public function index()
    {
        $acertijo = Acertijo::paginate(6);
        return view('acertijo.index', compact('acertijo'));
        
    }

    public function create()
    {
        return view('acertijo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            't_pregunta' => 'required',
            't_respuesta' => 'required',
            't_pista' => 'required',
            't_kword1' => 'required',
            't_kword2' => 'required',
            't_kword3' => 'required',
            
        ]);
        $acertijo = Acertijo::create($request->all());
        $notification = "El acertijo se creo correctamente";
        return redirect('/acertijo')->with(compact('notification'));
    }
    public function edit(Request $request, $id)
    {
        $acertijo = Acertijo::findOrFail($id);
        return view('acertijo.edit',compact('acertijo'));
    }

    public function update(Request $request,$id)
    {

        //mass assigment: asignacion masiva
        $acertijo = Acertijo::findOrFail($id);
        $data = $request->only('t_pregunta','t_respuesta','t_pista','t_kword1','t_kword2','t_kword3');
        $acertijo->fill($data);
        $acertijo->save();//UPDATE
        $notification = 'Se edito el acertijo se ha actualizado correctamente';
        return redirect('/acertijo')->with(compact('notification'));
    }

    public function destroy(Acertijo $acertijo)
    {
        
        $acertijo->delete();
        $notification = "El acertijo se ha eliminado correctamente";
        return redirect('/acertijo')->with(compact('notification'));
    }
    public function changeUse(Request $request)
    {
        $acertijo = Acertijo::find($request->i_id);
        $acertijo -> i_uso = $request->i_uso;
        //dd($acertijo);
        $acertijo->save();
        return response()->json(['success' => 'Uso Activo']);
    }
}