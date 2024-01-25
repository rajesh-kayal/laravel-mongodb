<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usrers;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user= new usrers();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if($user){
            return redirect('show')->with(['message'=>'data inserted']);
        }else{
            return redirect('/')->with(['message' => 'data not inserted']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users= usrers::all();
        return view('users')->with(['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = usrers::where('_id', $id)->first();
        return view('edit')->with(['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=usrers::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->save();
        if ($user) {
            return redirect('show')->with(['message' => 'data updated']);
        } else {
            return redirect('/')->with(['message' => 'data not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = usrers::find($id);
        $user->delete();
        if ($user) {
            return redirect('show')->with(['message' => 'data updated']);
        } else {
            return redirect('/')->with(['message' => 'data not updated']);
        }
    }
}
