<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to ';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }


    public function services()
    {
        $data = array(
            'title' => 'Our Services',
            'services' => ['Web Dev', 'Front', 'Back']
        ); //associative array
        return view('pages.services')->with($data);
    }
}
