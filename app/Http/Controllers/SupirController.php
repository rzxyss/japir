<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SupirController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $title = 'Supir';
        $supir = User::where('role', '=', 'supir')->get();
        return view('supir.index', compact('title', 'supir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Supir';
        return view('supir.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'pass' => 'required'
        ]);

        $supir = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'telp' => $request->input('telp'),
            'password' => Hash::make($request->input('pass')),
            'role' => 'supir'
        ]);

        if ($supir) {
            return redirect()->route('supir.index')->with('message', 'Supir Berhasil Ditambahkan!');
        } else {
            return redirect()->route('supir.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Supir!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $supir)
    {
        $title = 'Update Supir';
        return view('supir.edit', compact('title', 'supir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $supir)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'pass' => ['nullable', 'string']
        ]);

        $supir = User::findOrFail($supir->id);
        if ($request->input('pass') != null) {
            $supir->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'telp' => $request->input('telp'),
                'password' => Hash::make($request->input('pass'))
            ]);
        } else {
            $supir->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'telp' => $request->input('telp'),
            ]);
        }


        if ($supir) {
            return redirect()->route('supir.index')->with('message', 'Supir Berhasil Diupdate!');
        } else {
            return redirect()->route('supir.update', $supir->id)->with('error', 'Terjadi Kesalahan Saat Mengupdate Supir!');
        }
    }

    public function destroy(User $supir)
    {
        $supir->delete();
        if ($supir) {
            return redirect()->route('supir.index')->with('message', 'Supir Berhasil Dihapus!');
        } else {
            return redirect()->route('supir.index')->with('error', 'Terjadi Kesalahan Saat Menghapus Supir!');
        }
    }
}
