<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\EmployerRequest;
use App\Models\Education;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends FrontendBasecontroller
{
    protected $panel = 'Employer';  //for section/moudule
    protected $folder = 'frontend.employer.'; //for view file
    protected $base_route = 'frontend.employer.'; //for route method
    protected $title;
    protected $model = 'Employer';

    function __construct()
    {
        $this->model = new Employer();
    }

    public function signin()
    {
        $data = [];
        $this->title = "Employer";
        return view($this->__loadDataToView($this->folder . 'signin'), $data);
    }

    public function login(Request $request)
    {
        // dd('hello');
        $this->validator($request);
        if (Auth::guard('employers')->attempt($request->only('email', 'password'))) {
            return redirect()->route('employer.dashboard.index');
        }
        //Authentication failed...
        return $this->loginFailed();
    }
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|exists:employers',
            'password' => 'required|string|min:4|max:255'
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => "These credentials didn't match our records. Please try again",
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }

    public function logout()
    {
        // dd('hello');
        Auth::guard('employers')->logout();
        return redirect()->route('employer.signin');
    }

    public function dashboard()
    {
        // dd('hello');
        $data['jobs'] = Job::where('employer_id', Auth::guard('employers')->user()->id)->count();
        return view($this->__loadDataToView($this->folder . 'dashboard.index'), $data);
    }

    public function index()
    {
        $this->title = 'List';
        $data['employers'] = $this->model->withCount('jobs')->get();
        return view($this->__loadDataToView('backend.employer.index'), $data);
    }


    public function create()
    {
        $this->title = 'Employer';

        return view($this->__loadDataToView($this->folder . 'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerRequest $request)
    {
        // dd($request->all());

        $file = $request->file('logo_name');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('uploads/logos'), $fileName);
        $request->request->add(['logo' => $fileName]);

        $request->request->add(['password' => Hash::make($request->input('password'))]);


        $data['row'] = $this->model->create($request->all());

        if ($data['row']) {
            $request->session()->flash('success', 'Your account is successfully created. Enter your credentials to log in');
        } else {
            $request->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return view($this->__loadDataToView($this->folder . 'signin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = $this->model->withCount('jobs')->find($id);
        $data['jobs'] = Job::where('employer_id', $id)->get();
        if (!$data['row']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'View';
        return view($this->__loadDataToView('backend.employer.show'), $data);
    }


    public function applications()
    {
        $this->title = "Applications Received";
        $data['jobs'] = Job::where('employer_id', Auth::guard('employers')->user()->id)->get();
        return view($this->__loadDataToView('frontend.employer.applications'), $data);
    }

    public function applicantsDetail($id)
    {
        // dd('hello');
        $data['jobseeker'] = JobSeeker::where('id', $id)->first();
        $data['resume'] = Resume::where('jobseeker_id', $id)->first();
        $data['skills'] = $data['jobseeker']->skills()->get();
        $data['educations'] = Education::where('jobseeker_id', $id)->get();
        $profile_visit = $data['jobseeker']->profile_visit;
        $data['jobseeker']->update(['profile_visit' => $profile_visit + 1]);

        if (!$data['jobseeker']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = "Applicant's Detail";
        return view($this->__loadDataToView($this->folder . 'details'), $data);
    }

    public function downloadResume($id)
    {
        $data['jobseeker'] = JobSeeker::where('id', $id)->first();
        $cv_downloads = $data['jobseeker']->cv_downloads;
        $data['jobseeker']->update(['cv_downloads' => $cv_downloads + 1]);
        $data['resume'] = Resume::where('jobseeker_id', $id)->first();
        $file =  public_path() . "/uploads/resumes/" . $data['resume']->resume;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $data['resume']->resume, $headers);
    }

    public function edit($id)
    {
        $this->title = 'Edit Profile';
        $data['row'] = $this->model->find($id);
        return view($this->__loadDataToView($this->folder . 'edit'), $data);
    }

    public function jobsList()
    {
        $this->title = 'Job Lists';
        $data['jobs'] = Job::where('employer_id', Auth::guard('employers')->user()->id)->get();
        return view($this->__loadDataToView($this->folder . 'jobs'), $data);
    }

    public function profile()
    {
        $this->title = 'Employer';
        $data['employer'] = Employer::where('id', Auth::guard('employers')->user()->id)->first();
        return view($this->__loadDataToView($this->folder . 'profile'), $data);
    }


    public function update(Request $request, $id)
    {
        $data['row'] = $this->model->find($id);
        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'Profile is successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route('employer.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
