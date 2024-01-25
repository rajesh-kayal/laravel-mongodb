<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usrers;
class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $user= new usrers();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if($user){
            return redirect('show')->with(['success'=>'data inserted successfully!']);
        }else{
            return redirect('/')->with(['unsuccess' => 'data not inserted']);
        }
    }

    public function show()
    {
        $users= usrers::all();
        return view('users', compact('users'));
    }
    public function user(string $id)
    {
        $users = usrers::find(base64_decode($id));
        return view('user', compact('users'));
    }

    public function edit(string $id)
    {
        $users =usrers::find(base64_decode($id));
        return view('edit', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $user=usrers::findorfail(base64_decode($id));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if ($user) {
            return redirect('show')->with(['update' => 'data updated successfully!']);
        } else {
            return redirect('/')->with(['unupdate' => 'data not updated']);
        }
    }

    public function destroy(string $id)
    {
        $user = usrers::find(base64_decode($id));
        $user->delete();
        if ($user) {
            return redirect('show')->with(['delete' => 'data deleted successfully!']);
        } else {
            return redirect('/')->with(['undelete' => 'data not deleted']);
        }
    }
}
