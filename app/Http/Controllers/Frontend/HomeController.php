<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends FrontendBasecontroller
{
    protected $panel = 'Home';  //for section/moudule
    protected $folder = 'frontend.home.'; //for view file
    protected $base_route = 'frontend.home.'; //for route method
    protected $title;
    protected $model = 'Home';

    public function index()
    {
        $data['categories'] = Category::all();
        $data['jobs'] = Job::limit(4)->where('status', 1)->get();
        $data['fulls'] = Job::where('job_type_id', 1)->get();
        $data['parts'] = Job::where('job_type_id', 2)->get();

        if (isset(Auth::guard('jobseekers')->user()->id)) {
            $data['preferences'] = Job::where('category_id', Auth::guard('jobseekers')->user()->category_id)->get();
        }

        return view($this->__loadDataToView($this->folder . 'index'), $data);
    }

    public function search(Request $request)
    {
        $data['keyword'] = $request->keyword;
        $data['jobs'] = Job::where('title', 'ILIKE', '%' .   $data['keyword'] . '%')->get();
        // dd($data['jobs']);
        return view($this->__loadDataToView($this->folder . 'search'), $data);
    }

    public function categorySearch($slug)
    {
        $data['category'] = Category::where('slug', $slug)->firstOrFail();
        $data['jobs'] = $data['category']->jobs->all();
        return view($this->__loadDataToView($this->folder . 'category'), $data);
    }

    public function jobs()
    {
        $data['jobs'] = Job::all();
        return view($this->__loadDataToView($this->folder . 'jobs'), $data);
    }


    public function about()
    {
        return view($this->__loadDataToView($this->folder . 'about'));
    }

    public function contact()
    {
        return view($this->__loadDataToView($this->folder . 'contact'));
    }
}
