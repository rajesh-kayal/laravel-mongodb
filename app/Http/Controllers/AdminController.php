<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\usrers;
use App\Models\employees;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.form');
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $user= new employees();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if($user){
            return redirect('admin/show')->with(['success'=>'data inserted successfully!']);
        }else{
            return redirect('admin/add_users')->with(['unsuccess' => 'data not inserted']);
        }
    }

    public function show()
    {
        $users= employees::all();
        return view('admin.users', compact('users'));
    }
    public function user(string $id)
    {
        $users = employees::find(base64_decode($id));
        return view('admin.user', compact('users'));
    }

    public function edit(string $id)
    {
        $users =employees::find(base64_decode($id));
        return view('admin.edit', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $user=employees::findorfail(base64_decode($id));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if ($user) {
            return redirect('admin/show')->with(['update' => 'data updated successfully!']);
        } else {
            return redirect('admin/edit')->with(['unupdate' => 'data not updated']);
        }
    }

    public function destroy(string $id)
    {
        $user = employees::find(base64_decode($id));
        $user->delete();
        if ($user) {
            return redirect('admin/show')->with(['delete' => 'data deleted successfully!']);
        } else {
            return redirect('admin/show')->with(['undelete' => 'data not deleted']);
        }
    }
}
