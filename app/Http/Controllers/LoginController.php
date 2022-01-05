<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mail\SendVerif as SendVerif;
use Mail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function postlogin(Request $request){

        $remember = $request->remember ? true : false;

        // dd(Auth::attempt(['email' => $request->email, 'password' => ($request->password)]));
        if (Auth::attempt(['email' => $request->email, 'password' => ($request->password)],$remember)) {
            $user = User::find(Auth::id());
            if ($user->email_verified_at!=null) {
                if ($user->level->deskripsi_level=='Admin') {
                    return redirect('/dashboard')->with('success', 'Anda berhasil login Admin!');
                }else if($user->level->deskripsi_level=='Pelanggan'){
                    return redirect('/')->with('success', 'Anda berhasil login!');
                }
            }else{
                Auth::logout();
                return redirect('/login')->with('error','Akun anda belum diverifikasi! Silahkan verifikasikan email anda terlebih dahulu.');
            }
        }

        return back()->with('error', 'Login gagal! mohon periksa ulang email dan password Anda.');
    }

    public function verifikasi()
    {
        return view('verifikasi');
    }

    public function postverifikasi(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => ($request->password)])) {
            $user = User::find(Auth::id());
            Auth::logout();
            // dd($user);
            if ($user->email_verified_at!=null) {
                return redirect('/verifikasi_email')->with('error','Akun anda telah diverifikasi! Akun telah bisa digunakan login.');
            }else{
                // event(new Registered($user));
                $users = User::where('email',$user->email)->get();
                //informasi notifikasi
                $details = "Ini Detail";
                $keterangan = "Silahkan verifikasikan email anda pada akun website CV. Kopi Rakjat.";
                $subject = "Verifikasi Email Akun CV. Kopi Rakjat";
                $url = "http://localhost:8000/account/verif/".$user->id;

                foreach ($users as $pengguna) {
                    Mail::to($pengguna)->send(new SendVerif($details,$keterangan,$url,$subject,$pengguna));
                }
                return redirect('/login')->with('success','Link email verifikasi telah dikirimkan! Silahkan verifikasikan email anda.');
            }
        }
        return back()->with('error', 'Verifikasi gagal! mohon periksa ulang email dan password Anda.');
        
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user->level->deskripsi_level=='Admin') {
            Auth::logout();
            return redirect('/login');
        }else if($user->level->deskripsi_level=='Pelanggan'){
            Auth::logout();
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
