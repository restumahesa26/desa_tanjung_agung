<?php

namespace App\Http\Controllers;

use App\Models\BatasDesa;
use Illuminate\Http\Request;

class BatasDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BatasDesa::latest()->get();

        return view('pages.admin.batas-desa.index', [
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
        return view('pages.admin.batas-desa.create');
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
            'utara' => 'required|string|max:50',
            'selatan' => 'required|string|max:50',
            'barat' => 'required|string|max:50',
            'timur' => 'required|string|max:50',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        BatasDesa::create([
            'utara' => $request->utara,
            'selatan' => $request->selatan,
            'barat' => $request->barat,
            'timur' => $request->timur,
        ]);

        return redirect()->route('batas-desa.index')->with(['success' => 'Berhasil Menambah Batas Desa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BatasDesa  $batasDesa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BatasDesa  $batasDesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BatasDesa::findOrFail($id);

        return view('pages.admin.batas-desa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BatasDesa  $batasDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'utara' => 'required|string|max:50',
            'selatan' => 'required|string|max:50',
            'barat' => 'required|string|max:50',
            'timur' => 'required|string|max:50',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules1, $customMessages);

        $item = BatasDesa::findOrFail($id);

        $item->update([
            'utara' => $request->utara,
            'selatan' => $request->selatan,
            'barat' => $request->barat,
            'timur' => $request->timur,
        ]);

        return redirect()->route('batas-desa.index')->with(['success' => 'Berhasil Mengubah Batas Desa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BatasDesa  $batasDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BatasDesa::findOrFail($id);

        $item->delete();

        return redirect()->route('batas-desa.index')->with(['success' => 'Berhasil Menghapus Batas Desa']);
    }
}
