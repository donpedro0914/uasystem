<?php

namespace App\Http\Controllers;

use App\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    
    public function index()
    {
        return view('admin.alumni');
    }

    public function store(Request $request)
    {
        $alumni = new Alumni;
        $alumni->number = $request->number;
        $alumni->save();

        return ($alumni) ? redirect('alumni')->with('success', 'New Alumni Number Added') :
                        redirect('alumni')->with('error', 'There is something wrong');
    }

}
