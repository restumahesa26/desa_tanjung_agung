<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Berita::latest()->get();

        return view('pages.admin.berita.index', [
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
        return view('pages.admin.berita.create');
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
            'isi' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules, $customMessages);

        $value = $request->file('thumbnail');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/assets/berita-thumbnail', $value, $imageNames);
        $thumbnailpath = storage_path('app/public/assets/berita-thumbnail/' . $imageNames);
        Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'thumbnail' => $imageNames
        ]);

        return redirect()->route('berita.index')->with(['success' => 'Berhasil Menambah Berita']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Berita::findOrFail($id);

        return view('pages.admin.berita.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules1 = [
            'judul' => 'required|string|max:50',
            'isi' => 'required|string'
        ];

        $rules2 = [
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules1, $customMessages);

        if ($request->thumbnail) {
            $this->validate($request, $rules2, $customMessages);
        }

        $item = Berita::findOrFail($id);

        if($request->file('thumbnail')){
            $value = $request->file('thumbnail');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/berita-thumbnail', $value, $imageNames);
            $thumbnailpath = storage_path('app/public/assets/berita-thumbnail/' . $imageNames);
            $img = Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);
        }else {
            $imageNames = $item->thumbnail;
        }

        $item->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'thumbnail' => $imageNames
        ]);

        return redirect()->route('berita.index')->with(['success' => 'Berhasil Mengubah Berita']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berita::findOrFail($id);

        $item->delete();

        return redirect()->route('berita.index')->with(['success' => 'Berhasil Menghapus Berita']);
    }
}
