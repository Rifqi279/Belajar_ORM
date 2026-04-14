<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Proyek;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // READ + SEARCH
    public function index(Request $request)
    {
        $search = $request->input('search');

        $karyawan = Karyawan::with('proyek')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhereHas('proyek', function ($q) use ($search) {
                          $q->where('nama_proyek', 'like', '%' . $search . '%');
                      });
            })
            ->get();

        return view('karyawan.index', ['karyawan' => $karyawan, 'search' => $search]);
    }

    public function tambah()
    {
        $proyeks = Proyek::all();

        return view('karyawan.tambah', ['proyeks' => $proyeks]);
    }

    // CREATE
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'      => 'required',
            'posisi'    => 'required',
            'proyek_id' => 'nullable|exists:proyeks,id'
        ]);
    
        Karyawan::create([
            'nama'      => $validatedData['nama'],
            'posisi'    => $validatedData['posisi'],
            'proyek_id' => $validatedData['proyek_id']
        ]);

        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $proyeks  = Proyek::all();

        return view('karyawan.edit', ['karyawan' => $karyawan, 'proyeks' => $proyeks]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama'      => 'required',
            'posisi'    => 'required',
            'proyek_id' => 'nullable|exists:proyeks,id'
        ]);
        
        $karyawan->update([
            'nama'      => $request->nama,
            'posisi'    => $request->posisi,
            'proyek_id' => $request->proyek_id
        ]);

        return redirect('/karyawan');
    }

    // DELETE
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan');
    }
}