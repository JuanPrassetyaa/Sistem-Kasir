<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'password.required' => 'Password harus diisi'
        ]);


        $infoLogin = [
            'nama'=>$request->nama,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infoLogin)){
//INI UNTUK AUTHENTIKASI ROLE NYA AGAR MASUK KE HALAMAN MASING2 SESUAI AKUN
            if(Auth::user()->role == 'admin'){
                return redirect('dashboard');
            }
            elseif(Auth::user()->role == 'petugas'){
                return redirect('dashboard-petugas');
            }
//INI JIKA SALAH MEMASUKAN AKUN
        }
        else{
            return redirect('')->withErrors('Login Not Valid')->withInput();
        }

        }

        public function store(Request $request)
        {

            $validatedData= $request->validate([
                'nama' => 'required',
                'password' => 'required',
                'role' => 'required',
                'img' => 'required',
            ]);
            $image = $request->file('img');
            $imgName = time().rand().'.'.$image->extension();
            if(!file_exists(public_path('/fotoUsers'.$image->getClientOriginalName()))){
                $destinationPath = public_path('/fotoUsers');
                $image->move($destinationPath, $imgName);
                $uploaded = $imgName;
            }else{
                $uploaded = $image->getClientOriginalName();
            }

            $hashedPassword = Hash::make($request->password);

            User::create([
            'nama'=> $request->nama,
            'password' => $hashedPassword,
            'role' => $request->role,
            'img' => $uploaded,
            ]);

            return redirect()->route('dashboard')->withSuccess('Successfully added User')->withInput();
        }

    public function destroy($id)
{
    $data = User::find($id);

    if ($data) {
        $data->delete();
    }

    return redirect()->route('dashboard')->withSuccess('Successfuly Delete Users')->withInput();
}

    public function logout()
        {
            Auth::logout();
            return redirect('');
        }

}

