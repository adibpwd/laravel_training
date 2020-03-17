<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\errorForm;
use App\Data_Karyawan;
USE App\User;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table('users')->lists('fullname') masih error
        // $users = DB::table('users')->select('id', 'name as nama')->take('10')->get();
        $karyawan = Data_Karyawan::orderByRaw('id DESC')->paginate(10);
        // $user = User::select('users.id', 'users.role', 'data_karyawan.id')->first();
        return view('karyawan', compact(['karyawan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        return view('/create_karyawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(errorForm $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('sarirejo');
        // $user->remember_token = str_random(60);
        $user->save();
        
        $request->request->add([ 'user_id' => $user->id ]);
        
        $karyawan = Data_Karyawan::create($request->all());
        return redirect('/karyawan')->with('status', 'data telah ditambahkan');
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
        // karyawan()->where('id', $id)->get();
        return view('data_karyawan', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $dataKaryawan = Data_Karyawan::where('id', $id)->get();
        return view('/edit_karyawan', compact('dataKaryawan'));
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
        Data_Karyawan::where('id', $id)
                     ->update([
                     'name' => $request->name,    
                     'email' => $request->email,    
                     'alamat' => $request->alamat,    
                     ]);
        return redirect('/data_karyawan/'.$id)->with('status', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Data_Karyawan::select('name')->where('id', $id)->first();
        Data_Karyawan::destroy($id);
        User::where('name', $user->name)->delete();
        return redirect('/karyawan');
    }
}
