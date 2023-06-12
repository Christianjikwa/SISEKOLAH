<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);

        return view('pages.admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('pages.admin.pengumuman.create');
    }
    public function showPDF($filename)
    {
        // $path = Storage::disk('public')->path($filename);
        // return response()->file($path, ['Content-Type' => 'application/pdf']);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $file_name);
            $validated['file'] = $file_name;
        }

        Pengumuman::create($validated);

        return redirect('pengumuman')->with('success', 'Pengumuman berhasil disimpan.');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);

        return view('pages.admin.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);

        return view('pages.admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpeg|max:2048',
        ]);

        $pengumuman = Pengumuman::find($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $file_name);
            $validated['file'] = $file_name;


            if ($pengumuman->file && file_exists(public_path('files/' . $pengumuman->file))) {
                unlink(public_path('files/' . $pengumuman->file));
            }
        }

        $pengumuman->update($validated);

        return redirect('pengumuman')->with('success', 'Pengumuman berhasil diupdate.');
    }


    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);

        if ($pengumuman->file && file_exists(public_path('files/' . $pengumuman->file))) {
            unlink(public_path('files/' . $pengumuman->file));
        }

        $pengumuman->delete();

        return redirect('pengumuman')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
