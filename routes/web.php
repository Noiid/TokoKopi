<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/welcome', function () {
    return view('welcome');
});
//login
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/registrasi', 'LoginController@registrasi')->name('registrasi');
Route::get('/verifikasi_email', 'LoginController@verifikasi')->name('verifikasi');
Route::post('/postLogin', 'LoginController@postlogin');
Route::post('/postverifikasi', 'LoginController@postverifikasi');
Route::get('/logout','LoginController@logout');


Route::get('/account/verif/{id}','UserController@verif');

// home
Route::get('/','UserController@index_user');

Route::post('/user','UserController@store');



Route::group(['middleware' => ['auth','checkLevel:Admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');

    // data user level
    Route::get('/user_level','UserLevelController@index');
    Route::post('/user_level','UserLevelController@store');
    Route::post('/user_level/edit','UserLevelController@update');
    Route::get('/user_level/delete/{id}','UserLevelController@destroy');

    // data user 
    Route::get('/user','UserController@index');
    // Route::post('/user','UserController@store');
    // Route::post('/user/edit','UserController@update');
    Route::get('/user/delete/{id}','UserController@destroy');
    Route::post('/user/edit_pass','UserController@update_pass');

    // data kategori
    Route::get('/kategori','KategoriController@index');
    Route::post('/kategori','KategoriController@store');
    Route::post('/kategori/edit','KategoriController@update');
    Route::get('/kategori/delete/{id}','KategoriController@destroy');

    // data produk
    Route::get('/produk','ProdukController@index');
    Route::post('/produk','ProdukController@store');
    Route::post('/produk/edit','ProdukController@update');
    Route::get('/produk/delete/{id}','ProdukController@destroy');
    Route::get('/produk/detail/{id}','ProdukController@detail');
    
    Route::post('/gambar_produk','GambarProdukController@store');
    Route::get('/gambar_produk/delete/{id}','GambarProdukController@destroy');

    // data artikel 
    Route::get('/artikel','ArtikelController@index');
    Route::post('/artikel','ArtikelController@store');
    Route::post('/artikel/edit','ArtikelController@update');
    Route::get('/artikel/delete/{id}','ArtikelController@destroy');

    //profil toko
    Route::get('/profil_toko','ProfilTokoController@index');
    Route::post('/profil_toko','ProfilTokoController@store');
    Route::post('/profil_toko/edit','ProfilTokoController@update');

    // data sosmed
    // Route::get('/sosmed','SosmedController@index');
    Route::post('/sosmed','SosmedController@store');
    Route::post('/sosmed/edit','SosmedController@update');
    Route::get('/sosmed/delete/{id}','SosmedController@destroy');

    //data transaksi
    Route::get('/transaksi_proses','TransaksiController@index');
    Route::get('/transaksi_selesai','TransaksiController@show');
    Route::post('/transaksi/update_ongkir','TransaksiController@update_ongkir');
    Route::post('/transaksi/update_pengiriman','TransaksiController@update_pengiriman');

    Route::get('transaksi/chart','TransaksiController@chart');

    //data petani
    Route::get('/petani','PetaniController@index');
    Route::post('/petani','PetaniController@store');
    Route::post('/petani/edit','PetaniController@update');
    Route::get('/petani/delete/{id}','PetaniController@destroy');
});


// HAK AKSES USER (BUKAN TAMPILAN ADMIN)
Route::group(['middleware' => ['auth','checkLevel:Pelanggan,Admin']], function () {
    Route::post('/user/edit','UserController@update');
    Route::get('/cart', 'CartController@show');
    Route::post('/checkout', 'CartController@checkout');
    Route::post('/cek_pengiriman', 'CartController@cek_pengiriman');
    Route::post('/add-to-cart', 'CartController@store');
    Route::get('/cart/delete/{id}', 'CartController@destroy');

    //pembayaran
    Route::post('/transaksi/upload_bukti','PembayaranController@store');
    Route::get('/pembayaran/download/{id}','PembayaranController@download');
    Route::get('/pembayaran/acc/{id}','PembayaranController@acc');
    Route::get('/pembayaran/reject/{id}','PembayaranController@reject');

    Route::get('/transaksi/konfirmasi_selesai/{id}','TransaksiController@konfirmasi_selesai');

    //ulasan
    Route::post('/rating/ulasan','RatingController@store');
});
Route::group(['middleware' => ['auth','checkLevel:Pelanggan']], function () {
    Route::get('/profil','UserController@profil')->name('profil');
});

//produk
Route::get('/produk/detail_produk/{id}','ProdukController@detail_produk');
Route::get('/produk/list_produk','ProdukController@list_produk');

//cart 
// Route::get('/cart', 'CartController@show');



//artikel
Route::get('/artikel/list_artikel','ArtikelController@list_artikel');
Route::get('/artikel/detail_artikel/{id}','ArtikelController@detail_artikel');


// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
