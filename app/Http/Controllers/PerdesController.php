<?php

namespace App\Http\Controllers;

use App\Models\Perdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PerdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Perdes::latest()->get();

        return view('pages.admin.perdes.index', [
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
        return view('pages.admin.perdes.create');
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
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        Perdes::create([
            'judul' => $request->judul,
            'link' => $request->link
        ]);

        return redirect()->route('perdes.index')->with(['success' => 'Berhasil Menambah Perdes']);
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
        $item = Perdes::findOrFail($id);

        return view('pages.admin.perdes.edit', [
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
            'link' => 'required|string'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules1, $customMessages);

        $item = Perdes::findOrFail($id);

        $item->update([
            'judul' => $request->judul,
            'link' => $request->link,
        ]);

        return redirect()->route('perdes.index')->with(['success' => 'Berhasil Mengubah Perdes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Perdes::findOrFail($id);

        $item->delete();

        return redirect()->route('perdes.index')->with(['success' => 'Berhasil Menghapus Perdes']);
    }
}
