<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Jobs;
use App\Applications;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Hash;
 
 
class HomeController extends Controller
{
    public function index()
    {
        $jobCount = Jobs::all()->count();
        $companyCount = User::where('role', 2)->count();
        $applicants = User::where('role', 1)->count();
        return view('admin.dashboard', ['jobCount' => $jobCount, 'applicants' => $applicants, 'companyCount' => $companyCount]);
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
        $jobHistory = Jobs::select('jobs.job_title', 'jobs.company', 'applications.status')->leftJoin('applications', 'jobs.id', '=', 'applications.job_id')->where('applications.user_id', $id)->get();
        return view('admin.view_applicant', compact('user', 'jobHistory'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function view_application($id)
    {
        $application = Applications::select('users.*', 'applications.*', 'applications.status as jobstatus')->leftJoin('users', 'users.id', '=', 'applications.user_id')->where('applications.id', $id)->first();
        return view('admin.view_application', ['application' => $application]);
    }

    public function users()
    {
        $users = User::where('role', '!=', '0')->get();
        return view('admin.users', compact('users'));
    }

    public function view_user($id)
    {
        $user = User::findOrFail($id);
        return view('admin.view_user', ['user' => $user]);
    }

    public function update_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if(!empty($request->input('password'))) {
        $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return ($user) ? redirect('/users')->with('success', 'User Successfuly Updated') :
                        redirect('/users')->with('error', 'Something went wrong');
    }
     
    public function admin_users()
    {
        $users = User::where('user_role', '!=', '')->get();
        return view('admin.admin_users', compact('users'));
    }

    public function user_register(Request $request)
    {
        $user = new User;
        $user->name = $request->fname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = '01/01/1990';
        $user->gender = 'm';
        $user->status = '1';
        $user->user_role = $request->user_role;
        $user->username = $request->username;
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return ($user) ? redirect('admin-users')->with('success', 'New Admin Added') :
                        redirect('admin-users')->with('error', 'There is something wrong');
    }
}