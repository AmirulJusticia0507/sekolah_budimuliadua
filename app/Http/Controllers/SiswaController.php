<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'nis' => 'required|integer|digits:10|unique:siswa,nis',
            'nama_siswa' => 'required|string|max:255',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'kelamin' => 'required|in:Laki-laki,Perempuan',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Log the validated data to check what is being saved
        Log::info('Storing new Siswa: ', $validated);

        // Create a new Siswa record
        Siswa::create($validated);

        // Redirect with success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $siswa = Siswa::with('kelas')->findOrFail($nis);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $siswa = Siswa::findOrFail($nis);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        // Validate the request
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'kelamin' => 'required|in:Laki-laki,Perempuan',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Log the data being updated
        Log::info('Updating Siswa with NIS ' . $nis . ': ', $validated);

        // Update the Siswa record
        Siswa::where('nis', $nis)->update($validated);

        // Redirect with success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        Siswa::where('nis', $nis)->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
