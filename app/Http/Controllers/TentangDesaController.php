<?php

namespace App\Http\Controllers;

use App\Models\TentangDesa;
use Illuminate\Http\Request;

class TentangDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TentangDesa::latest()->get();

        return view('pages.admin.tentang-desa.index', [
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
        return view('pages.admin.tentang-desa.create');
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
            'tentang_desa' => 'required|string',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
        ];

        $this->validate($request, $rules, $customMessages);

        TentangDesa::create([
            'tentang_desa' => $request->tentang_desa,
        ]);

        return redirect()->route('tentang-desa.index')->with(['success' => 'Berhasil Menambah Tentang Desa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TentangDesa  $tentangDesa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TentangDesa  $tentangDesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TentangDesa::findOrFail($id);

        return view('pages.admin.tentang-desa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TentangDesa  $tentangDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'tentang_desa' => 'required|string'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules1, $customMessages);

        $item = TentangDesa::findOrFail($id);

        $item->update([
            'tentang_desa' => $request->tentang_desa,
        ]);

        return redirect()->route('tentang-desa.index')->with(['success' => 'Berhasil Mengubah Tentang Desa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TentangDesa  $tentangDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TentangDesa::findOrFail($id);

        $item->delete();

        return redirect()->route('tentang-desa.index')->with(['success' => 'Berhasil Menghapus Tentang Desa']);
    }
}
