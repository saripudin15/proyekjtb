<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiInternalController extends Controller
{
    public function index() {
        $data_pegintern = DB::table('tbl_pegintern')->paginate(5);
        return view('pegawaiinternal.pegintern', ['data_pegintern' => $data_pegintern]);
    }

    public function tambah() {
        return view('pegawaiinternal.peginterntambah');
    }

    public function simpan(Request $request) {
        //dd($request->all());
        $this->_validation($request);

        DB::insert('insert into tbl_pegintern (kode_pegintern, nama_pegintern, jenis_kelamin, jabatan, no_hp, email, alamat) values (?, ?, ?, ?, ?, ?, ?)', [$request->kode_pegintern, $request->nama_pegintern, $request->jenis_kelamin, $request->jabatan, $request->no_hp, $request->email, $request->alamat]);
       
        //DB::table('tbl_pegintern')->insert([
           // ['kode_pegintern' => $request->kode_pegintern, 'nama_pegintern' => $request->nama_pegintern, 'jenis_kelamin' => $request->jenis_kelamin, 'jabatan' => $request->jabatan, 'no_hp' => $request->no_hp, 'email' => $request->email, 'alamat' =>$request->alamat],
            //['kode_pegintern' => $request->kode_pegintern.'xx', 'nama_pegintern' => $request->nama_pegintern.'xx', 'jenis_kelamin' => $request->jenis_kelamin.'xx', 'jabatan' => $request->jabatan.'xx', 'no_hp' => $request->no_hp.'xx', 'email' => $request->email.'xx', 'alamat' =>$request->alamat.'xx'],
            //]);
        return redirect()->route('pegawaiinternal')->with('message','Data berhasil disimpan');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'kode_pegintern' => 'required|min:4|max:15',
            'nama_pegintern' => 'required|min:3|max:191',
            'jenis_kelamin' =>'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ],
        [
            'kode_pegintern.required' => 'Kode pegawai harus diisi',
            'kode_pegintern.min' => 'Minimal 4 karakter',
            'kode_pegintern.max' => 'Maksimal 15 karakter',
            'nama_pegintern.required' => 'Nama pegawai harus diisi',
            'nama_pegintern.min' => 'Minimal 3 karakter',
            'nama_pegintern.max' => 'Maksimal 191 karakter',
            'jenis_kelamin.required' => 'Pilih salah satu jenis kelamin',
            'jabatan.required' => 'Jabatan harus diiisi',
            'no_hp.required' => 'No Hp harus diisi',
            'email.required' => 'Email harus diisi',
            'alamat.required' => 'Alamat harus diisi',

        ]
        );
    }

    public function edit($id){
        $data_pegintern = DB::table('tbl_pegintern')->where('id',$id)->first();

        return view('pegawaiinternal.peginternedit',['data_pegintern' => $data_pegintern]);
    }

    public function update(Request $request,$id){
        $this->_validation($request);
        DB::table('tbl_pegintern')->where('id',$id)->update([
            'kode_pegintern' => $request->kode_pegintern,
            'nama_pegintern' => $request->nama_pegintern,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('pegawaiinternal')->with('message','Data berhasil diupdate');
    }

    public function hapus($id){
        DB::table('tbl_pegintern')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
