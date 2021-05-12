<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $client = User::all();
        return view('admin.index', compact('client'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|min:3',
            'email'=>'required|email',
        ];
        $this->validate($request,$rules);

        //mass assigment: asignacion masiva
        User::create(
            $request->only('name','email','role')
            + [
                
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification = 'El nuevo usuario se ha registrado correctamente';
        return redirect('/client')->with(compact('notification'));

    }
    public function edit($id)
    {
        $client = User::client()->findOrFail($id);
        return view('admin.edit',compact('client'));
    }

    
    public function update(Request $request, $id)
    {
        $rules = [
            'name'=>'required|min:3',
            'email'=>'required|email',
        ];
        $this->validate($request,$rules);

        //mass assigment: asignacion masiva
        $user = User::client()->findOrFail($id);
        $data = $request->only('name','email');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();//UPDATE
        $notification = 'La informacion del usuario se ha actualizado correctamente';
        return redirect('/client')->with(compact('notification'));
    }

   
    public function destroy(User $client)
    {
        $clientName = $client->name;
        $client->delete();

        $notification = "EL usuario $clientName se ha eliminado correctamente";
        return redirect('/client')->with(compact('notification'));
    }
}