<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use App\User;
use App\Produk;
use App\Artikel;
use App\UserLevel;
use App\Transaksi;
use Illuminate\Support\Str;
use App\Mail\SendVerif as SendVerif;
use Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = UserLevel::orderBy('id_level','desc')->get();
        $users = User::orderBy('id','desc')->get();

        return view('admin.user.index',['level' => $level, 'users' => $users]);
    }

    public function index_user()
    {
        $artikel = Artikel::orderBy('id_artikel','desc')->first();
        $produk = Produk::orderBy('id_produk','desc')->get();

        return view('user.home',[
            'artikel' => $artikel,
            'produk' => $produk
        ]);
    }

    public function profil()
    {
        $riwayat_transaksi = Transaksi::where('id',auth()->user()->id)->orderBy('created_at','desc')->get();
        return view('user.profil',[
            'user' => auth()->user(),
            'riwayat_transaksi' => $riwayat_transaksi
        ]);
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
        if ($request->password != $request->confirm_password){
            return back()->with('error','Registrasi gagal! Password dan Konfirmasi Password tidak sama.');
        }

        $user = new User();

        $user->name = $request->name;
        // $user->nama_belakang = $request->nama_belakang;
        $user->email = $request->email;
        $user->telp_user = $request->telp_user;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->id_level = $request->id_level;
        $user->save();

        $users = User::where('email',$user->email)->get();
        //informasi notifikasi
        $details = "Ini Detail";
        $keterangan = "Silahkan verifikasikan email anda pada akun website CV. Kopi Rakjat.";
        $subject = "Verifikasi Email Akun CV. Kopi Rakjat";
        $url = "http://localhost:8000/account/verif/".$user->id;

        foreach ($users as $pengguna) {
            Mail::to($pengguna)->send(new SendVerif($details,$keterangan,$url,$subject,$pengguna));
        }
        // event(new Registered($user));

        return back()->with('success','Selamat berhasil melakukan registrasi!, Silahkan verifikasi email terlebih dahulu melalui pesan telah dikirimkan ke email Anda.');

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
    public function update_pass(Request $request)
    {
        if ($request->password != $request->confirm_password){
            return back()->with('error','Ubah Password gagal! Password dan Konfirmasi Password harus sama.');
        }
        User::find($request->id)->update(['password' => bcrypt($request->password)]);
        return back()->with('success','Berhasil mengubah password!');

    }

    public function update(Request $request)
    {

        User::find($request->id)->update($request->all());
        return back()->with('success','Berhasil mengubah data user!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->with('success','Berhasil menghapus data user.');
    }

    public function verif($id)
    {
        $user = User::find($id);
        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('success','Akun anda telah terverifikasi! Akun telah bisa digunakan login.');

    }
}
