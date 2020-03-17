<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Data_Karyawan;
use App\Hobi;
use App\Hobi_Karyawan;
use App\Telepon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'karyawan',
            'password' => Hash::make($data['password']),
        ]);


        
        $karyawan = Data_Karyawan::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'user_id' => $user['id'],
            'alamat' => $data['alamat'],
        ]);

        foreach( $data['hobi'] as $dataH ) {   // pakai cara lain tanpa foreach
            $hobi = Hobi_Karyawan::create([
                'karyawan_id' => $karyawan['id'],
                'hobi_id' => $dataH
            ]);
        }

        foreach( $data['telepon'] as $dataT ) {
            $telepon = Telepon::create([
                'data_karyawan_id' => $karyawan['id'],
                'telepon' => $dataT
            ]);
        }
        return $user;


    }
}
