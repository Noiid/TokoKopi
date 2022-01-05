<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Comment;
use App\User;
use App\Produk;
use App\Transaksi;
use App\GambarComment;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        request()->validate([
            'file' => 'required',
            'file.*' => 'required|mimes:jpeg,jpg,png|max:5120'
        ],
        [
            'file.*.max' => 'File gambar maksimal berukuran 5MB!',
            'file.*.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
        ]);

        // store to rating table
        Rating::create([
            'id_transaksi' => $request->id_transaksi,
            'id_produk' => $request->id_produk,
            'besar_rating' => $request->demo
        ]);

        //store to comment table
        $comment = new Comment();
        $comment->id_transaksi = $request->id_transaksi;
        $comment->id_produk = $request->id_produk;
        $comment->isi_comment = $request->isi_comment;
        $comment->save();

        $produk = Produk::find($request->id_produk);
        $transaksi = Transaksi::find($request->id_transaksi);
        $user = User::find($transaksi->id);
        if($request->hasfile('file')) { 
            foreach($request->file('file') as $file){
                $fileName = 'comment_tr'.$transaksi->id_transaksi.'_'.$user->name.'_pro'.$produk->id_produk.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$file->getClientOriginalExtension();
                //store to gambar comment table
                GambarComment::create([
                    'id_comment' => $comment->id_comment,
                    'gambar_comment' => 'rating/'.$fileName
                ]); 
                $path = $file->storeAs('public/rating',$fileName);
            }
            
        }

        return back()->with('success','Berhasil memberikan ulasan produk!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
