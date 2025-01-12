<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $title = 'Data Jadwal';
        $jadwal = Jadwal::with('supir', 'mobil')->get();

        return view('jadwal.index', compact('title', 'jadwal'));
    }

    public function create()
    {
        $title = 'Tambah Jadwal';
        $supir = User::where('role', '=', 'supir')->get();
        $mobil = Mobil::all();

        return view('jadwal.create', compact('title', 'supir', 'mobil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl' => 'required',
            'jam' => 'required',
            'lj' => 'required',
            'lt' => 'required',
            'supir' => 'required',
            'mobil' => 'required'
        ]);

        $jadwal = Jadwal::create([
            'tanggal_jalan' => $request->tgl,
            'jam_jalan' => $request->jam,
            'lokasi_jemput' => $request->lj,
            'lokasi_tujuan' => $request->lt,
            'id_supir' => $request->supir,
            'id_mobil' => $request->mobil,
            'status' => '0'
        ]);

        if ($jadwal) {
            return redirect()->route('jadwal.index')->with('message', 'Mobil Berhasil Ditambahkan!');
        } else {
            return redirect()->route('jadwal.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Mobil!');
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
    public function edit(Jadwal $jadwal)
    {
        $title = 'Edit Jadwal';
        $supir = User::where('role', '=', 'supir')->get();
        $mobil = Mobil::all();

        return view('jadwal.edit', compact('title', 'jadwal', 'supir', 'mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $this->validate($request, [
            'tgl' => 'required',
            'jam' => 'required',
            'lj' => 'required',
            'lt' => 'required',
            'supir' => 'required',
            'mobil' => 'required',
            'status' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($jadwal->id);

        $jadwal->update([
            'tanggal_jalan' => $request->tgl,
            'jam_jalan' => $request->jam,
            'lokasi_jemput' => $request->lj,
            'lokasi_tujuan' => $request->lt,
            'id_supir' => $request->supir,
            'id_mobil' => $request->mobil,
            'status' => $request->status
        ]);

        if ($jadwal) {
            return redirect()->route('jadwal.index')->with('message', 'Jadwal Berhasil Diupdate!');
        } else {
            return redirect()->route('jadwal.edit', $jadwal->id)->with('error', 'Terjadi Kesalahan Saat Mengupdate Jadwal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        if ($jadwal) {
            return redirect()->route('jadwal.index')->with('message', 'Jadwal Berhasil Dihapus!');
        } else {
            return redirect()->route('jadwal.index')->with('error', 'Terjadi Kesalahan Saat Menghapus Jadwal!');
        }
    }
}
