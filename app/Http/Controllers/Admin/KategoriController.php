<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    { 
        $data =[
            'title'=>'Data Kategori',
            'kategori' => Kategori::all()
        ];
        return view('admin.data-kategori', $data);

    }
      public function create()
    {
        $data = [
            'title' => 'Data Kategori',
        ];
        return view('admin.form-kategori', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
            'deskripsi' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi.',
            'nama_kategori' => 'Nama kategori suda ada di dalam database!',
            'deskripsi' => 'Deskripsi kategori harus diisi!',
        ]);

        Kategori::create($validatedData);
        return redirect()->route('admin.kategori')->with('success','Data kategori berhasil ditambahkan kedalamdatabase');
    }

    public function edit(Kategori $kategori)
    {
        $data = [
            'title' => 'Data kategori',
            'kategori' => $kategori,
        ];
        return view('admin.form-edit-kategori', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $kategori = Kategori::find($id);
        $validatedData = $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $id,
            'deskripsi' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi.',
            'nama_kategori' => 'Nama kategori suda ada di dalam database!',
            'deskripsi' => 'Deskripsi kategori harus diisi!',
        ]);

        $kategori->update($validatedData);
        return redirect()->route('admin.kategori')->with('success','Data kategori berhasil di-update kedalamdatabase');

    }

    public function delete(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('admin.kategori')->with('success','Data kategori berhasil ditambahkan kedalamdatabase');
    }

}