<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperiencesController extends Controller
{
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'tahun_awal' => 'required',
            'tahun_akhir' => 'nullable',
            'posisi_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'detail_pengalaman' => 'required'
        ], [
            'tahun_awal.required' => 'Inputan ini wajib diisi',
            'posisi_pekerjaan.required' => 'Inputan ini wajib diisi',
            'nama_perusahaan.required' => 'Inputan ini wajib diisi',
            'detail_pengalaman.required' => 'Inputan ini wajib diisi',
        ]);
        if ($validasi->fails()) {
            return redirect('/dashboard?active=resume')->withErrors($validasi)->withInput();
        }
        if ($request->tahun_akhir < $request->tahun_awal) {
            return redirect('/dashboard?active=resume')->with('error_tahun_akhir', 'Tahun akhir tidak boleh kurang dari tahun awal');
        }
        $tahun_akhir = 'present';
        if ($request->tahun_akhir != null) {
            $tahun_akhir = $request->tahun_akhir;
        }
        Experiences::create([
            'tahun_awal' => $request->tahun_awal,
            'tahun_akhir' => $tahun_akhir,
            'posisi_pekerjaan' => $request->posisi_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'detail_pengalaman' => $request->detail_pengalaman
        ]);
        return redirect('/dashboard?active=resume')->with('success', 'Sukses menambahkan pengalaman kerja!');
    }
    public function destroy($id) {
        $experience = Experiences::findOrFail($id);
        $experience->delete();
        return redirect('/dashboard?active=resume')->with('success', 'Sukses menghapus pengalaman kerja');
    }
    public function edit($id) {
        $experience = Experiences::findOrFail($id);
        return view('admin.form-edit.form-edit-experience', compact('experience'));
    }
    public function update(Request $request, $id) {
        $validasi = Validator::make($request->all(), [
            'tahun_awal' => 'required',
            'tahun_akhir' => 'nullable',
            'posisi_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'detail_pengalaman' => 'required'
        ], [
            'tahun_awal.required' => 'Inputan ini wajib diisi',
            'posisi_pekerjaan.required' => 'Inputan ini wajib diisi',
            'nama_perusahaan.required' => 'Inputan ini wajib diisi',
            'detail_pengalaman.required' => 'Inputan ini wajib diisi',
        ]);
        if ($validasi->fails()) {
            return redirect('/dashboard?active=resume')->withErrors($validasi)->withInput();
        }
        if ($request->tahun_akhir < $request->tahun_awal) {
            return redirect()->back()->with('error_tahun_akhir', 'Tahun akhir tidak boleh kurang dari tahun awal');
        }
        $tahun_akhir = 'present';
        if ($request->tahun_akhir != null) {
            $tahun_akhir = $request->tahun_akhir;
        }
        $experience = Experiences::findOrFail($id);
        $experience->update([
            'tahun_awal' => $request->tahun_awal,
            'tahun_akhir' => $tahun_akhir,
            'posisi_pekerjaan' => $request->posisi_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'detail_pengalaman' => $request->detail_pengalaman
        ]);
        return redirect('/dashboard?active=resume')->with('success', 'Sukses mengupdate pengalaman kerja!');
    }
}
