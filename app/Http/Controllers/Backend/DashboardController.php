<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomOwner;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected $panel = 'Dashboard';  //for section/moudule
    protected $folder = 'backend.dashboard.'; //for view file
    protected $base_route = 'backend.dashboard.'; //for route method
    protected $title;


    public function index()
    {
        $data['jobseekers'] = JobSeeker::count();
        $data['categories'] = Category::count();
        $data['jobs'] = Job::count();
        $data['employers'] = Employer::count();

        return view($this->__loadDataToView($this->folder . 'index'), $data);
    }
}
