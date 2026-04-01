<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //READ
    public function index()
    {
        $karyawan = Karyawan::all(); // -> SELECT * FROM karyawan
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
        ]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        $karyawan->nama = $request->nama;
        $karyawan->posisi = $request->posisi;

        $karyawan->save();
        return redirect('/karyawan');
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan');
    }
}
