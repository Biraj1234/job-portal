<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\EmployerRequest;
use App\Models\Education;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EducationController extends FrontendBasecontroller
{
    protected $panel = 'Education';  //for section/moudule
    protected $folder = 'frontend.education.'; //for view file
    protected $base_route = 'frontend.education.'; //for route method
    protected $title;
    protected $model = 'Education';

    function __construct()
    {
        $this->model = new Education();
    }

    public function index()
    {
        $this->title = 'List';
        $data['employers'] = $this->model->withCount('jobs')->get();
        return view($this->__loadDataToView('backend.employer.index'), $data);
    }


    public function create()
    {
        $this->title = 'Add Education';
        return view($this->__loadDataToView($this->folder . 'create'));
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $request->request->add(['jobseeker_id' => Auth::guard('jobseekers')->user()->id]);
        $data['row'] = $this->model->create($request->all());

        if ($data['row']) {
            $request->session()->flash('success', 'Education qualification is added successfully');
        } else {
            $request->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return redirect()->route('jobseeker.profile');
    }




    public function update(Request $request, $id)
    {
        $data['row'] = $this->model->find($id);
        $data['row']->update($request->all());
        if ($data['row']) {
            request()->session()->flash('success', $this->panel . ' successfully updated');
        } else {
            request()->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route('jobseeker.profile');
    }

    public function edit($id)
    {
        $this->title = 'Edit';
        $data['row'] = $this->model->find($id);
        return view($this->__loadDataToView($this->folder . 'edit'), compact('data'));
    }

    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        $data['row']->delete();
        if ($data['row']) {
            request()->session()->flash('success', $this->panel . ' successfully deleted');
        } else {
            request()->session()->flash('error', 'Error in deleting' . $this->panel);
        }
        return redirect()->route('jobseeker.profile');
    }
}
