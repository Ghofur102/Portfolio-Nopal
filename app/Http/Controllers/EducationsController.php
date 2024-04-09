<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationsController extends Controller
{
    public function store(Request $request) {
        $validasi = Validator::make($request->all(), [
            'tahun_awal_edukasi' => 'required',
            'tahun_akhir_edukasi' => 'nullable',
            'jurusan' => 'required',
            'nama_sekolah' => 'required',
            'detail_yang_dipelajari' => 'required',
        ], [
            'tahun_awal_edukasi.required' => 'Inputan ini wajib diisi!',
            'jurusan.required' => 'Inputan ini wajib diisi!',
            'nama_sekolah.required' => 'Inputan ini wajib diisi!',
            'detail_yang_dipelajari.required' => 'Inputan ini wajib diisi!',
        ]);
        if ($validasi->fails()) {
            return redirect('/dashboard?active=education')->withErrors($validasi)->withInput();
        }
        if ($request->tahun_akhir_edukasi < $request->tahun_awal_edukasi) {
            return redirect('/dashboard?active=education')->with('error_tahun_akhir_edukasi', 'Inputan tahun akhir tidak boleh kurang dari tahun awal');
        }
        $tahun_akhir_edukasi = 'present';
        if ($request->tahun_akhir_edukasi != null) {
            $tahun_akhir_edukasi = $request->tahun_akhir_edukasi;
        }
        Educations::create([
            'tahun_awal' => $request->tahun_awal_edukasi,
            'tahun_akhir' => $tahun_akhir_edukasi,
            'jurusan' => $request->jurusan,
            'nama_sekolah' => $request->nama_sekolah,
            'detail_yang_dipelajari' => $request->detail_yang_dipelajari
        ]);
        return redirect('/dashboard?active=education')->with('success', 'Sukses menambahkan riwayat edukasi anda!');
    }
    public function destroy($id) {
        $edu = Educations::findOrFail($id);
        $edu->delete();
        return redirect('/dashboard?active=education')->with('success', 'Sukses menghapus riwayat pendidikan');
    }
}
