<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies');
    }

    public function store(Request $request)
    {
        $c = new Company;
        $c->name = $request->name;
        $c->description = $request->description;
        $c->source = $request->source;
        $c->save();

        return ($c) ? redirect('companies')->with('success', 'New Company Added') :
                        redirect('companies')->with('error', 'There is something wrong');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.edit_company', compact('company'));
    }

}
