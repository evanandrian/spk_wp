<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('auth/loginNew');
    }

    public function login(Request $request)
    {
        $rules = [
            'namauser'              => 'required|string',
            'password'              => 'required|string'
        ];

        $messages = [
            'namauser.required'     => 'Nama User wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'namauser'     => $request->input('namauser'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $data = array(
                'content'   => 'content/home',
            );
            return view('layout/wrapper',$data);
        } else { // false
            //Login Fail
            Session::flash('error', 'Nama User atau password salah');
            $data = array(
                'content'   => '',
            );
            return view('auth/loginNew',$data);
        }

    }

    public function showFormRegister()
    {
        $data = array(
            'content'   => '',
        );
        return view('auth/registerNew');
    }

    public function register(Request $request)
    {
        $rules = [
            'namauser'              => 'required|unique:users',
            'password'              => 'required|confirmed',
        ];

        $messages = [
            'namauser.required' => 'Nama User wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->namauser));
        $user->namauser = ucwords(strtolower($request->namauser));
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            $data = array(
                'content'   => '',
            );
            return view('auth/loginNew',$data);
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            $data = array(
                'content'   => '',
            );
            return view('auth/registerNew',$data);
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        $data = array(
            'content'   => '',
        );
        return view('auth/loginNew',$data);
    }

    /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();
        if($user){
            Session::flash('success', 'Password Berhasil Dirubah');
            return redirect()->back()->with('success','Password Berhasil Dirubah');
        } else {
            Session::flash('errors', ['' => 'Password Gagal Dirubah']);
            return redirect()->back()->with('errors','Password Gagal Dirubah');
        }
    }
}
