<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all() ?: [];
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jumlah_siswa' => 'required|integer',
            'tahun_ajaran' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        Kelas::create($validated);
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jumlah_siswa' => 'required|integer',
            'tahun_ajaran' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        Kelas::where('id_kelas', $id)->update($validated);
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::where('id_kelas', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
