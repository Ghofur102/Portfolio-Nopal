<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function send_message(Request $request) {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ], [
            'full_name.required' => 'Inputan ini wajib diisi',
            'email.required' => 'Inputan ini wajib diisi',
            'email.email' => 'Inputan ini wajib berupa email',
            'phone.required' => 'Inputan ini wajib diisi',
            'phone.numeric' => 'Inputan ini wajib berupa angka',
            'message.required' => 'Inputan ini wajib diisi'
        ]);
        if ($validator->fails()) {
            return redirect('/#contact')->withErrors($validator)->withInput();
        }
        Messages::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        return redirect('/#contact')->with('success', 'Sukses mengirim pesan');
    }
}
