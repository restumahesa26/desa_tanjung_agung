<?php

namespace App\Http\Controllers;

use App\Models\BatasDesa;
use App\Models\Berita;
use App\Models\Bumdes;
use App\Models\Galeri;
use App\Models\KritikSaran;
use App\Models\PemerintahDesa;
use App\Models\Perdes;
use App\Models\TentangDesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $tentangDesa = TentangDesa::first();
        $bumdes = Bumdes::paginate(3);
        $berita = Berita::paginate(3);
        $galeri = Galeri::inRandomOrder()->paginate(6);

        return view('pages.user.home', [
            'tentangDesa' => $tentangDesa, 'bumdes' => $bumdes, 'berita' => $berita, 'galeri' => $galeri
        ]);
    }

    public function profil_desa()
    {
        $tentangDesa = TentangDesa::first();
        $batasDesa = BatasDesa::first();
        $pemerintahDesa = PemerintahDesa::first();
        $bumdes = Bumdes::latest()->get();

        return view('pages.user.profil-desa', [
            'tentangDesa' => $tentangDesa, 'batasDesa' => $batasDesa, 'pemerintahDesa' => $pemerintahDesa, 'bumdes' => $bumdes,
        ]);
    }

    public function berita()
    {
        $berita = Berita::latest()->get();

        return view('pages.user.berita', [
            'berita' => $berita
        ]);
    }

    public function bumdes()
    {
        $bumdes = Bumdes::latest()->get();

        return view('pages.user.bumdes', [
            'bumdes' => $bumdes
        ]);
    }

    public function perdes()
    {
        $perdes = Perdes::latest()->get();

        return view('pages.user.perdes', [
            'perdes' => $perdes
        ]);
    }

    public function galeri()
    {
        $galeri = Galeri::get();

        return view('pages.user.galeri', [
            'galeri' => $galeri
        ]);
    }

    public function kontak()
    {
        return view('pages.user.kontak');
    }

    public function store_kontak(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:50',
            'no_handphone' => 'required|numeric',
            'subjek' => 'required|string|max:100',
            'pesan' => 'required|string'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'numeric' => 'Field :attribute harus berupa angka'
        ];

        $this->validate($request, $rules, $customMessages);

        KritikSaran::create([
            'nama' => $request->nama,
            'no_handphone' => $request->no_handphone,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('home')->with(['success' => 'Terima Kasih Atas Kritik dan Sarannya']);
    }
}
