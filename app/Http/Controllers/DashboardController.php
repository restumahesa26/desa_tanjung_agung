<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Bumdes;
use App\Models\Galeri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $berita = Berita::count();
        $bumdes = Bumdes::count();
        $galeri = Galeri::count();

        return view('pages.admin.dashboard')->with(compact('berita', 'bumdes', 'galeri'));
    }
}
