<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;



class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::latest();
        $noUrut = $aspirasi->max('id');
        $kategori = Kategori::all();
        $id = abs($noUrut + 1);
        return View('aspirasi', [
            'title' => 'Pengaduan',
            'aspirasi' => $aspirasi->fillter(request(['search']))->get(),
            'no' => $id,
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {

        // $request->file("gambar");
        // var_dump($request->file("gambar"));
        $this->validate($request, [
            'nik' => 'required',
            'lokasi' => 'required',
            'ket' => 'required'
        ]);

        $data = Siswa::all()->where('id', $request->nik)->count();
        if ($data > 0) {
            if($request->file('gambar')){
                $file = $request->file('gambar');
                $gambarlsp = round(microtime(true) * 1000).$file->getClientOriginalName();
                $file->move(public_path('gambarlsp'), $gambarlsp);
            }
            Input_aspirasi::create([
                'id' => $request->id,
                'nik' => $request->nik,
                'lokasi' => $request->lokasi,
                'kategori_id' => $request->kategori_id,
                'ket' => $request->ket,
                'gambar' => $gambarlsp
            ]);
            Aspirasi::create([  
                'id' => $request->id,
                'id_aspirasi' => $request->id,
                'kategori_id' => $request->kategori_id,
            ]);
            return Redirect("/aspirasi?id=$request->id");
        } else {
            return Redirect("/aspirasi?nik=$request->nik");
        }
    }

    public function search(Request $request)
    {
        $aspirasi = Aspirasi::where('id_aspirasi',  $request->search)->get()->first()->toArray();
        //return view('aspirasi', ['aspirasi' => $aspirasi]);
        return redirect('/aspirasi?search=' . $request->search)->with(['aspirasi' => $aspirasi]);
    }

    public function feedback(Request $request)
    {
        Aspirasi::where('id_aspirasi',  $request->id_aspirasi)
            ->update(['feedback' => $request->feedback]);

        return redirect('/aspirasi?search=' . $request->id_aspirasi);
    }
}
