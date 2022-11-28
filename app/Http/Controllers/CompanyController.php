<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Jobs;
use App\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies');
    }

    public function company_index()
    {
        $jobCount = Jobs::where('company', Auth::user()->name)->count();
        return view('admin.company_dashboard', ['jobCount' => $jobCount]);
    }

    public function registration()
    {
        return view('company_registration');
    }

    public function jobs()
    {
        return view('admin.company_jobs');
    }

    public function jobs_store(Request $request)
    {        
        $job = new Jobs;
        $job->job_title = $request->title;
        $job->company = $request->company;
        $job->job_description = $request->description;
        $job->job_responsibilities = $request->responsibilities;
        $job->job_requiremnts = $request->requiremnts;
        $job->job_type = '';
        $job->save();

        return ($job) ? redirect('/company/jobs')->with('success', 'New Job Added') :
                        redirect('/company/jobs')->with('error', 'There is something wrong');
    }

    public function jobs_edit($id)
    {
        $job = Jobs::findOrFail($id);
        return view('admin.edit_company_jobs', compact('job'));
    }

    public function store(Request $request)
    {

        if($request->hasFile('logo')) {
            $path = public_path().'/logo/'.$request->name.'/';
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $logoFile = $filename;
            
        } else {
            $logoFile = '';
        }

        $c = new User;
        $c->name = $request->name;
        $c->username = $request->username;
        $c->email = $request->email;
        $c->phone = $request->phone;
        $c->password = Hash::make($request->password);
        $c->logo = $logoFile;
        $c->role = 2;
        $c->status = false;
        $c->save();

        return view('thankyou');
    }

    public function view_company($id)
    {
        $company = User::findOrFail($id);
        return view('admin.view_company', compact('company'));
    }

    public function update_company($id, Request $request)
    {
        
        $company = User::findOrFail($id);

        if($request->hasFile('logo')) {
            $path = public_path().'/logo/'.$request->name.'/';
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $logoFile = $filename;
            
        } else {
            $logoFile = $company->logo;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->status = $request->status;
        $company->logo = $logoFile;
        $company->save();

        return ($company) ? redirect('companies')->with('success', 'Company Updated') :
                        redirect('Companies')->with('error', 'There is something wrong');
    }

    public function applicants()
    {
        return view('admin.company_applicants');
    }

    public function view_applicant($id)
    {
        $user = User::findOrFail($id);
        return view('admin.view_company_applicant', compact('user'));
    }

}
