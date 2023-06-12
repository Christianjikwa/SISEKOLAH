<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;



class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayar =Pembayaran::all();
        return view('pages.guru.pembayaran.index', compact('bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guru.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'waktu' => 'required',
            'nama_siswa' => 'required',
            'rp' => 'required|numeric',
            'keterangan' => 'required',
            'angkatan' => 'required'
        ]);

        $data = new Pembayaran([
            'waktu' => $validatedData['waktu'],
            'nama_siswa' => $validatedData['nama_siswa'],
            'rp' => $validatedData['rp'],
            'keterangan' => $validatedData['keterangan'],
            'angkatan' => $validatedData['angkatan']]);
        $data->save();
       return redirect('bayaran')->with('success', 'Data pembayaran berhasil ditambah');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil pembayaran dengan ID tertentu dari database
        $bayar = Pembayaran::find($id);

        // Jika artikel tidak ditemukan, tampilkan pesan error
        if (!$bayar) {
            return response()->json([
                'message' => 'Id pembayaran tidak ditemukan.'
            ], 404);
        }

        // Jika artikel ditemukan, tampilkan halaman detail artikel
        return view('pages.guru.pembayaran.show', [
            'bayar' => $bayar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data pembayaran yang akan di edit
        $pembayaran = Pembayaran::findOrFail($id);
        // kembalikan view edit dengan data pembayaran
        return view('pages.guru.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, $id)
    {
    // validasi inputan
    $validatedData = $request->validate([
        'waktu' => 'required',
        'nama_siswa' => 'required',
        'rp' => 'required',
        'keterangan' => 'required',
        'angkatan'=>'required'
    ]);


    // ambil data pembayaran yang akan diupdate
    $pembayaran = Pembayaran::findOrFail($id);

    // update data pembayaran dengan data baru
    $pembayaran->waktu = $validatedData['waktu'];
    $pembayaran->nama_siswa= $validatedData['nama_siswa'];
    $pembayaran->rp= $validatedData['rp'];
    $pembayaran->keterangan = $validatedData['keterangan'];
    $pembayaran->angkatan = $validatedData['angkatan'];


    // simpan perubahan pada database
    $pembayaran->save();

    // redirect ke halaman index dengan pesan sukses
    return redirect()->route('bayaran.index')->with('success', 'Data pembayaran berhasil diupdate.');

}


public function destroy($id)
    {
        // cari data pembayaran berdasarkan id
        $pembayaran = Pembayaran::findOrFail($id);

        // hapus data pembayaran
        $pembayaran->delete();
        // kembalikan halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('bayaran.index')->with('success', 'Data Pembayaran Berhasil Dihapus');
    }
}
