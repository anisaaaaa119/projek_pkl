<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        return view('Peminjam.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required', 
            'tanggal' => 'required|date',
        ]);

        Peminjam::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'status' => 'pending'
        ]);

        return redirect()->route('peminjam.index')->with('success', 'Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);
        return view('Peminjam.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required', 
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        $peminjam = Peminjam::findOrFail($id);
        $peminjam->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'status' => $request->status
        ]);

        return redirect()->route('peminjam.index')->with('success', 'Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        return redirect()->route('peminjam.index')->with('success', 'Berhasil Dihapus!');
    }
}
