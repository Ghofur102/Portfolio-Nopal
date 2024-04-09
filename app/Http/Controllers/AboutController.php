<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function update_about(Request $request) {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'link_linkedin' => 'required',
            'link_github' => 'required',
            'about' => 'required'
        ], [
            'full_name.required' => 'Inputan ini wajib diisi!',
            'link_linkedin.required' => 'Inputan ini wajib diisi!',
            'link_github.required' => 'Inputan ini wajib diisi!',
            'about.required' => 'Inputan ini wajib diisi!',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $about = About::first();
        $about->update([
            'full_name' => $request->full_name,
            'link_linkedin' => $request->link_linkedin,
            'link_github' => $request->link_github,
            'about' => $request->about
        ]);
        return redirect()->back()->with('success', 'Sukses mengupdate biodata!');
    }
}
