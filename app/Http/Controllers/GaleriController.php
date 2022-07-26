<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Galeri::latest()->get();

        return view('pages.admin.galeri.index', [
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
        return view('pages.admin.galeri.create');
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
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules, $customMessages);

        $value = $request->file('foto');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/assets/foto-galeri', $value, $imageNames);
        $thumbnailpath = storage_path('app/public/assets/foto-galeri/' . $imageNames);
        Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);

        Galeri::create([
            'judul' => $request->judul,
            'foto' => $imageNames
        ]);

        return redirect()->route('galeri.index')->with(['success' => 'Berhasil Menambah Galeri']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Galeri::findOrFail($id);

        return view('pages.admin.galeri.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'judul' => 'required|string|max:50',
        ];

        $rules2 = [
            'foto' => 'image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules1, $customMessages);

        if ($request->foto) {
            $this->validate($request, $rules2, $customMessages);
        }

        $item = Galeri::findOrFail($id);

        if($request->file('foto')){
            $value = $request->file('foto');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/foto-galeri', $value, $imageNames);
            $thumbnailpath = storage_path('app/public/assets/foto-galeri/' . $imageNames);
            $img = Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);
        }else {
            $imageNames = $item->foto;
        }

        $item->update([
            'judul' => $request->judul,
            'foto' => $imageNames
        ]);

        return redirect()->route('galeri.index')->with(['success' => 'Berhasil Mengubah Galeri']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);

        $item->delete();

        return redirect()->route('galeri.index')->with(['success' => 'Berhasil Menghapus Galeri']);
    }
}
