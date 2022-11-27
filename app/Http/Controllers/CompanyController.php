<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies');
    }

    public function registration()
    {
        return view('company_registration');
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

}
