<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\area;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index () {
       //ini pake query builder
        // $data_area = DB::table('areas')->paginate(5);
        $data_area = area::paginate(5);
        return view('areajob.area', ['data_area' => $data_area]);
    }

    public function tambah() {
        return "halaman tambah";
    }

    public function simpan(Request $request) {
        //dd($request->all());
        //$data_area = new area;
        //data_area->kode_area = $request->kode_area;
        //data_area->nama_pekerjaan = $request->nama_pekerjaan;
        //data_area->lokasi = $request->lokasi;
        area::create($request->all());
        return redirect()->back();
    }

    public function edit($id) {
        return view('areajob.editarea');
    }

    public function update(Request $request, $id) {
        return "halaman simpan";
    }
    
    public function hapus($id) {
        return "halaman simpan";
    }
}
