<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title_project' => 'required',
            'description_jobdesck' => 'required',
            'photo_project' => 'required|max:50000'
        ], [
            'title_project.required' => 'Inputan ini wajib diisi',
            'description_jobdesck.required' => 'Inputan ini wajib diisi',
            'photo_project.required' => 'Inputan ini wajib diisi',
            'photo_project.max' => 'Photo tidak boleh lebih dari 50MB'
        ]);
        if ($validator->fails()) {
            return redirect('/dashboard?active=project')->withErrors($validator)->withInput();
        }
        Projects::create([
            'title_project' => $request->title_project,
            'photo_project' => $request->file('photo_project')->store('photo-project'),
            'description_jobdesck' => $request->description_jobdesck
        ]);
        return redirect('/dashboard?active=project')->with('success', 'Sukses menambahkan projek');
    }
    public function destroy($id) {
        $project = Projects::findOrFail($id);
        Storage::delete($project->photo_project);
        $project->delete();
        return redirect('/dashboard?active=project')->with('success', 'Sukses menghapus projek');
    }
}
