<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Educations;
use App\Models\Experiences;
use App\Models\Messages;
use App\Models\Projects;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home() {
        $about = About::first();
        $experiences = Experiences::all();
        $educations = Educations::all();
        $projects = Projects::all();
        return view('home', compact('about', 'experiences', 'educations', 'projects'));
    }
    public function login() {
        return view('login.login');
    }
    public function dashboard() {
        $about = About::first();
        $experiences = Experiences::all();
        $educations = Educations::all();
        $projects = Projects::all();
        $messages =  Messages::all();
        return view('admin.dashboard', compact('about', 'experiences', 'educations', 'projects', 'messages'));
    }
}
