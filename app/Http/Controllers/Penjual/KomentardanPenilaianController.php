<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Produk;
use Illuminate\Http\Request;

class KomentardanPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualId = auth('penjual')->user()->id;
        // $komentars = Komentar::all();
        $komentars = Komentar::with(['pembeli', 'produk' => function ($query) use ($penjualId) {
            $query->where('id_penjual', $penjualId);
        }], 'pembeli.transaksi')->get();
        // dd($komentars);
        return view('client.komentar.index', compact('komentars'));
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
        $request->validate([
            'id_pembeli' => 'required|exists:pembeli,id',
            'id_produk' => 'required|exists:produk,id',
            'komentar' => 'string|max:255',
            'penilaian' => 'required|integer|min:1|max:5',
        ]);

        $komentar = Komentar::create([
            'id_pembeli' => $request->id_pembeli,
            'id_produk' => $request->id_produk,
            'komentar' => $request->komentar,
            'penilaian' => $request->penilaian,
        ]);

        return response()->json($komentar, 201);
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
