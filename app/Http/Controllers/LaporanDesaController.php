<?php

namespace App\Http\Controllers;

use App\Models\LaporanDesa;
use Illuminate\Http\Request;

class LaporanDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = LaporanDesa::latest()->get();

        return view('pages.admin.laporan-desa.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.laporan-desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|string|max:50',
            'link' => 'required|string',
            'isi' => 'required|string',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        LaporanDesa::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'isi' => $request->isi
        ]);

        return redirect()->route('laporan-desa.index')->with(['success' => 'Berhasil Menambah Laporan Desa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = LaporanDesa::findOrFail($id);

        return view('pages.admin.laporan-desa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'judul' => 'required|string|max:50',
            'link' => 'required|string',
            'isi' => 'required|string'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules1, $customMessages);

        $item = LaporanDesa::findOrFail($id);

        $item->update([
            'judul' => $request->judul,
            'link' => $request->link,
            'isi' => $request->isi,
        ]);

        return redirect()->route('laporan-desa.index')->with(['success' => 'Berhasil Mengubah Laporan Desa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = LaporanDesa::findOrFail($id);

        $item->delete();

        return redirect()->route('laporan-desa.index')->with(['success' => 'Berhasil Menghapus Laporan Desa']);
    }
}
