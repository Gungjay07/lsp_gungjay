<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return View('Admin', [
            'type' => 'Dashboard',
            'title' => 'Admin',
            'kategori' => Kategori::all(),
            'aspirasi' => Aspirasi::latest()->where('feedback',  null)->fillter(request(['search', 'kategori', 'waktu', 'status']))->paginate(5),
            'selesai' => Aspirasi::latest()->where('status', "Selesai")->where('feedback', '!=', null)->fillter(request(['search', 'kategori', 'waktu']))->paginate(5)
        ]);
    }
    public function status(Request $request)
    {
        Aspirasi::where('id_aspirasi',  $request->id_aspirasi)
            ->update(['status' => $request->status]);
        return redirect('/admin');
    }
    public function history()
    {
        return View('Admin', [
            'type' => 'History',
            'title' => 'Admin',
            'kategori' => Kategori::all(),
            'aspirasi' => Aspirasi::latest()->where('feedback',  null)->fillter(request(['search', 'kategori', 'waktu', 'status']))->paginate(5),
            'selesai' => Aspirasi::latest()->where('status', "Selesai")->where('feedback', '!=', null)->fillter(request(['search', 'kategori', 'waktu']))->paginate(5)
        ]);
    }

    public function delete(Request $request)
    {
        Aspirasi::where('id', $request->id_aspirasi)->delete();
        Input_aspirasi::where('id', $request->id_aspirasi)->delete();
        return redirect('/admin');
    }
}
