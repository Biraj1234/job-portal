<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobSeekerRequest;
use App\Models\Category;
use App\Models\Education;
use App\Models\Job;
use App\Models\JobJobseeker;
use App\Models\JobSeeker;
use App\Models\JobSeekerSkill;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class JobSeekerController extends FrontendBasecontroller
{
    protected $panel = 'Job Seeker';  //for section/moudule
    protected $folder = 'frontend.jobseeker.'; //for view file
    protected $base_route = 'frontend.jobseeker.'; //for route method
    protected $title;
    protected $model = 'Job';

    function __construct()
    {
        $this->model = new JobSeeker();
    }

    public function index()
    {
        $this->title = 'List';
        $data['jobseekers'] = $this->model->all();
        return view($this->__loadDataToView('backend.jobseeker.index'), $data);
    }

    public function signin()
    {
        $data = [];
        $this->title = "Job Seeker";
        return view($this->__loadDataToView($this->folder . 'signin'), $data);
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $this->validator($request);
        if (Auth::guard('jobseekers')->attempt($request->only('email', 'password'))) {
            return redirect()->route('jobseeker.dashboard.index');
        }
        //Authentication failed...
        return $this->loginFailed();
    }
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|exists:jobseekers',
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
        Auth::guard('jobseekers')->logout();
        return redirect()->route('jobseeker.signin');
    }

    public function dashboard()
    {

        $this->title = "Dashboard";
        $data['seekers'] = JobSeeker::where('id', Auth::guard('jobseekers')->user()->id)->first();
        $data['jobs'] = $data['seekers']->jobs->count();
        $data['profile_visit'] = $data['seekers']->profile_visit;
        $data['downloads'] = $data['seekers']->cv_downloads;
        return view($this->__loadDataToView($this->folder . 'dashboard.index'), $data);
    }

    public function apply(Request $request)
    {
        if ($request->job_id) {
            $request->validate(
                [
                    'resume_name' => 'required|mimes:pdf',
                ],
                [
                    'resume_name.required' => 'Please attach your C.V.',
                    'resume_name.mimes' => 'File must be of PDF format.'
                ]
            );

            $file = $request->file('resume_name');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/resumes'), $fileName);;


            $data['row'] = JobJobseeker::create($request->all());
            if ($data['row']) {

                $resumeData['jobseeker_id'] = $request->jobseeker_id;
                $resumeData['resume'] = $fileName;
                Resume::create($resumeData);
                $request->session()->flash('success', "You have succesfully applied for the job.");
                return redirect()->route('jobseeker.jobs');
            } else {
                $request->session()->flash('error', 'Error in creating' . $this->panel);
            }
            return redirect()->route('jobseeker.jobs');
        } else {
            $request->session()->flash('success', 'Please login to apply for this job');
            return redirect()->route('jobseeker.signin');
        }
    }

    public function appliedJobs()
    {
        $this->title = "Applied Jobs";
        $data['seekers'] = JobSeeker::where('id', Auth::guard('jobseekers')->user()->id)->first();
        $data['jobs'] = $data['seekers']->jobs;

        return view($this->__loadDataToView($this->folder . 'jobs'), $data);
    }


    public function create()
    {
        $this->title = 'Job Seeker';

        $data['skill'] = Skill::all();
        $data['categories'] = Category::pluck('title', 'id');

        return view($this->__loadDataToView($this->folder . 'create'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobSeekerRequest $request)
    {
        // dd($request->all());
        $file = $request->file('profile_name');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('uploads/jobseekers'), $fileName);
        $request->request->add(['profile_picture' => $fileName]);

        $request->request->add(['password' => Hash::make($request->input('password'))]);


        $data['row'] = $this->model->create($request->all());

        if ($data['row']) {
            $request->session()->flash('success', 'Your account is successfully created. Enter your credentials to log in');
            $jobskillArray['jobseeker_id'] = $data['row']->id;

            //For Multiple skills
            $job_skill_id = $request->input('job_skill_id');
            for ($i = 0; $i < count($job_skill_id); $i++) {
                $jobskillArray['job_skill_id'] = $job_skill_id[$i];
                JobSeekerSkill::create($jobskillArray);
            }
        } else {
            $request->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return redirect()->route('jobseeker.signin');
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

        if (!$data['row']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'View';
        return view($this->__loadDataToView('backend.jobseeker.show'), $data);
    }


    public function profile()
    {
        $this->title = 'My Information';



        $data['jobseeker'] = $this->model->where('id', Auth::guard('jobseekers')->user()->id)->first();

        $data['skills'] = $data['jobseeker']->skills()->get();

        $data['educations'] = Education::where('jobseeker_id', Auth::guard('jobseekers')->user()->id)->get();

        return view($this->__loadDataToView($this->folder . 'dashboard.profile'), $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->title = 'Update Profile';
        $data['skill'] = Skill::all();
        $data['row'] = $this->model->find($id);
        return view($this->__loadDataToView($this->folder . 'edit'), $data);
    }

    public function update(Request $request, $id)
    {

        $data['row'] = $this->model->find($id);
        if ($request->hasFile('profile_name')) {

            $oldFile = 'uploads/jobseekers/' . $data['row']->profile_picture;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('profile_name');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/jobseekers'), $fileName);
            $request->request->add(['profile_picture' => $fileName]);
        }


        $data['row']->update($request->all());

        if ($data['row']) {
            $request->session()->flash('success', $this->panel . ' successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route('jobseeker.profile');
    }


    public function destroy($id)
    {
        //
    }
}
