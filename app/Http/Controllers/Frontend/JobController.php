<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobJobSkill;
use App\Models\JobLevel;
use App\Models\Location;
use App\Models\Skill;
use App\Models\Type;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobController extends FrontendBasecontroller
{
    protected $panel = 'Job';  //for section/moudule
    protected $folder = 'frontend.job.'; //for view file
    protected $base_route = 'frontend.job.'; //for route method
    protected $title;
    protected $model = 'Job';

    function __construct()
    {
        $this->model = new Job();
    }

    public function index()
    {
        $data['jobs'] = $this->model->all();
        $this->title = "List";
        return view($this->__loadDataToView('backend.job.index'), $data);
    }


    public function create()
    {
        $data['types'] = Type::pluck('title', 'id');
        $data['levels'] = JobLevel::pluck('title', 'id');
        $data['categories'] = Category::pluck('title', 'id');
        $data['locations'] = Location::pluck('name', 'id');
        $data['skill'] = Skill::all();
        $this->title = 'Post Job';

        return view($this->__loadDataToView($this->folder . 'create'), $data);
    }


    public function store(JobRequest $request)
    {

        // dd($request->all());

        $request->request->add(['employer_id' => Auth::guard('employers')->user()->id]);
        $data['row'] = $this->model->create($request->all());

        if ($data['row']) {
            $jobskillArray['job_id'] = $data['row']->id;

            //For Multiple skills
            $job_skill_id = $request->input('job_skill_id');
            for ($i = 0; $i < count($job_skill_id); $i++) {
                $jobskillArray['job_skill_id'] = $job_skill_id[$i];
                JobJobSkill::create($jobskillArray);
            }
            $request->session()->flash('success', 'Job successfully posted');
        } else {
            $request->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return redirect()->route('employer.dashboard.jobs');
    }

    public function show($id)
    {
        // dd('hello');
        $data['job'] = $this->model->find($id);
        $data['jobseeker'] = Auth::guard('jobseekers')->user();
        $today = Carbon::now()->format('Y-m-d');
        $deadline = $data['job']->deadline;
        $date1 = new DateTime($today);
        $date2 = new DateTime($deadline);
        $interval = $date1->diff($date2);
        $data['daysRemain'] = $interval->format('%a');
        if (!$data['job']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder . 'show'), $data);
    }


    public function edit($id)
    {
        // dd($id);
        $data['row'] = $this->model->find($id);
        $data['types'] = Type::pluck('title', 'id');
        $data['levels'] = JobLevel::pluck('title', 'id');
        $data['categories'] = Category::pluck('title', 'id');
        $data['locations'] = Location::pluck('name', 'id');
        $data['skill'] = Skill::all();
        return view($this->__loadDataToView($this->folder . 'edit'), $data);
    }


    public function update(Request $request, $id)
    {
        // dd('hello');
        $data['row'] = $this->model->find($id);
        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', $this->panel . ' successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route('employer.dashboard.jobs');
    }

    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        $data['row']->delete();
        if ($data['row']) {
            request()->session()->flash('success', 'Job successfully deleted');
        } else {
            request()->session()->flash('error', 'Error in deleting' . $this->panel);
        }
        return redirect()->route('employer.dashboard.jobs');
    }
}
