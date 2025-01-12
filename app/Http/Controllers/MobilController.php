<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Mobil';
        $mobil = Mobil::all();
        return view('mobil.index', compact('title', 'mobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Mobil';
        return view('mobil.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_wil' => 'required',
            'nopol' => 'required',
            'kd_blk' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'warna' => 'required'
        ]);

        $mobil = Mobil::create([
            'kode_wilayah' => $request->kd_wil,
            'nomor_polisi' => $request->nopol,
            'kode_belakang' => $request->kd_blk,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'warna' => $request->warna
        ]);

        if ($mobil) {
            return redirect()->route('mobil.index')->with('message', 'Mobil Berhasil Ditambahkan!');
        } else {
            return redirect()->route('mobil.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Mobil!');
        }
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
    public function edit(Mobil $mobil)
    {
        $title = 'Edit Mobil';
        return view('mobil.edit', compact('title', 'mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $this->validate($request, [
            'kd_wil' => 'required',
            'nopol' => 'required',
            'kd_blk' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'warna' => 'required'
        ]);

        $mobil = Mobil::findOrFail($mobil->id);

        $mobil->update([
            'kode_wilayah' => $request->kd_wil,
            'nomor_polisi' => $request->nopol,
            'kode_belakang' => $request->kd_blk,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'warna' => $request->warna
        ]);

        if ($mobil) {
            return redirect()->route('mobil.index')->with('message', 'Mobil Berhasil Diupdate!');
        } else {
            return redirect()->route('mobil.edit', $mobil->id)->with('error', 'Terjadi Kesalahan Saat Mengupdate Mobil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        if ($mobil) {
            return redirect()->route('mobil.index')->with('message', 'Mobil Berhasil Dihapus!');
        } else {
            return redirect()->route('mobil.index')->with('error', 'Terjadi Kesalahan Saat Menghapus Mobil!');
        }
    }
}
