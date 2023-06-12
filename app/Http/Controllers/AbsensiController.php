<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // public function index()
    // {
    //     $guru = Guru::all();
    //     $siswa = Siswa::join('gurus', 'siswas.user_id', '=', 'user.id')
    //         ->select('siswas.*', 'gurus.nama as nama')
    //         ->get();

    //     return view('absensi.index', compact('guru', 'siswa'));
    // }
    public function index()
    {
        $absensi = Absensi::all();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        return view('absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'tanggal' => 'required',
            'mapel' => 'required',
            'status' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.edit', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'tanggal' => 'required',
            'mapel' => 'required',
            'status' => 'required',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
