<?php

namespace App\Http\Controllers;

use App\Models\PemerintahDesa;
use Illuminate\Http\Request;

class PemerintahDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PemerintahDesa::latest()->get();

        return view('pages.admin.pemerintah-desa.index', [
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
        return view('pages.admin.pemerintah-desa.create');
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
            'kades' => 'required|string|max:50',
            'sekdes' => 'required|string|max:50',
            'kaur_umum_perencanaan' => 'required|string|max:50',
            'kasi_kesra' => 'required|string|max:50',
            'kasi_pelayanan' => 'required|string|max:50',
            'kasi_pemerintah' => 'required|string|max:50',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        PemerintahDesa::create([
            'kades' => $request->kades,
            'sekdes' => $request->sekdes,
            'kaur_umum_perencanaan' => $request->kaur_umum_perencanaan,
            'kasi_kesra' => $request->kasi_kesra,
            'kasi_pelayanan' => $request->kasi_pelayanan,
            'kasi_pemerintah' => $request->kasi_pemerintah,
        ]);

        return redirect()->route('pemerintah-desa.index')->with(['success' => 'Berhasil Menambah Pemerintah Desa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemerintahDesa  $pemerintahDesa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemerintahDesa  $pemerintahDesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = PemerintahDesa::findOrFail($id);

        return view('pages.admin.pemerintah-desa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemerintahDesa  $pemerintahDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'kades' => 'required|string|max:50',
            'sekdes' => 'required|string|max:50',
            'kaur_umum_perencanaan' => 'required|string|max:50',
            'kasi_kesra' => 'required|string|max:50',
            'kasi_pelayanan' => 'required|string|max:50',
            'kasi_pemerintah' => 'required|string|max:50',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules1, $customMessages);

        $item = PemerintahDesa::findOrFail($id);

        $item->update([
            'kades' => $request->kades,
            'sekdes' => $request->sekdes,
            'kaur_umum_perencanaan' => $request->kaur_umum_perencanaan,
            'kasi_kesra' => $request->kasi_kesra,
            'kasi_pelayanan' => $request->kasi_pelayanan,
            'kasi_pemerintah' => $request->kasi_pemerintah,
        ]);

        return redirect()->route('pemerintah-desa.index')->with(['success' => 'Berhasil Mengubah Pemerintah Desa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemerintahDesa  $pemerintahDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PemerintahDesa::findOrFail($id);

        $item->delete();

        return redirect()->route('pemerintah-desa.index')->with(['success' => 'Berhasil Menghapus Pemerintah Desa']);
    }
}
