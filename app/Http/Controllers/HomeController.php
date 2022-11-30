<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Jobs;
use App\Applications;
use App\User;
 
 
class HomeController extends Controller
{
    public function index()
    {
        $jobCount = Jobs::all()->count();
        $applicants = User::where('role', 1)->count();
        return view('admin.dashboard', ['jobCount' => $jobCount, 'applicants' => $applicants]);
    }

    public function jobs()
    {
        return view('admin.jobs');
    }

    public function applicants()
    {
        return view('admin.applicants');
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

        return ($job) ? redirect('jobs')->with('success', 'New Job Added') :
                        redirect('jobs')->with('error', 'There is something wrong');
    }

    public function jobs_edit($id)
    {
        $job = Jobs::findOrFail($id);
        return view('admin.edit_jobs', compact('job'));
    }

    public function jobs_update($id, Request $request)
    {
        $job = Jobs::findOrFail($id);
        $job->job_title = $request->title;
        $job->job_description = $request->description;
        $job->job_responsibilities = $request->responsibilities;
        $job->job_requiremnts = $request->requiremnts;
        $job->job_type = '';
        $job->status = $request->status;
        $job->save();

        return ($job) ? redirect('jobs')->with('success', 'Job Updated') :
                        redirect('jobs')->with('error', 'There is something wrong');
    }

    public function applyjob(Request $request)
    {
        $job_id = $request->input('job_id');
        $user_id = $request->input('user_id');

        $apply = new Applications;
        $apply->job_id = $job_id;
        $apply->user_id = $user_id;
        $apply->save();

        return response()->json($apply);

    }

    public function delete_job($id)
    {
        $job = Jobs::find($id)->delete();

        return response()->json($job);
    }

    public function view_applicant($id)
    {
        $user = User::findOrFail($id);
        return view('admin.view_applicant', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
     
}