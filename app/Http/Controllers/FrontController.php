<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Jobs;
use App\User;
use App\Alumni;
use File;

use Session;

class FrontController extends Controller
{
    public function index() {
        $jobCount = Jobs::all()->count();
        $jobs = Jobs::where('status', 1)->limit(5)->get();
        return view('welcome', ['jobCount' => $jobCount], compact('jobs'));
    }

    public function job_hiring()
    {
        $jobCount = Jobs::all()->count();
        $jobs = Jobs::where('status', 1)->get();
        return view('job-list', ['jobCount' => $jobCount], compact('jobs'));
    }

    public function jobs_info($id)
    {
        $job = Jobs::findOrFail($id);
        return view('job-info', ['job' => $job]);
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('profile', ['user' => $user]);
    }

    public function profile_update($id, Request $request)
    {

        $user = User::findOrFail($id);

        if($request->hasFile('cv')) {
            $path = public_path().'/cv/';
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $file = $request->file('cv');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $cvFile = $filename;
            
        } else {
            $cvFile = $user->cv;
        }

        $user->name = $request->fname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->cv = $cvFile;
        $user->save();

        return ($user) ? redirect('/')->with('success', 'Profile Updated') :
                        redirect('/')->with('error', 'There is something wrong');
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function checkalumni(Request $request)
    {
        $checkalumni = Alumni::where('number', request('alumni'))->where('status', 0)->first();

        if($checkalumni) {
            return response()->json($checkalumni);
        }
    }

    public function checkalumnidup(Request $request)
    {
        $checkalumni = User::where('alumni_id', request('alumni'))->first();

        if($checkalumni) {
            return response()->json($checkalumni);
        }
    }

    public function downloadcv($file)
    {
        $path = public_path() . '/cv/' . $file;
        return response()->download($path);
    }

}
