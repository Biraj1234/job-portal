<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\FacilityRequest;
use App\Http\Requests\RoomRequest;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BackendBaseController
{
    protected $panel = 'Category';  //for section/moudule
    protected $folder = 'backend.category.'; //for view file
    protected $base_route = 'backend.category.'; //for route method
    protected $title;
    protected $model = 'Category';

    function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        $this->title = 'List';
        $data['rows'] = $this->model->all();
        return view($this->__loadDataToView($this->folder . 'index'), compact('data'));
    }

    public function create()
    {
        $this->title = 'Create';

        return view($this->__loadDataToView($this->folder . 'create'));
    }


    public function store(CategoryRequest $request)
    {

        $data['row'] = $this->model::create($request->all());
        if ($data['row']) {
            $request->session()->flash('success', $this->panel . ' successfully created');
        } else {
            $request->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return redirect()->route($this->base_route . 'index');
    }


    public function show($id)
    {
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder . 'show'), compact('data'));
    }


    public function edit($id)
    {
        $this->title = 'Edit';
        $data['row'] = $this->model->find($id);
        return view($this->__loadDataToView($this->folder . 'edit'), compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data['row'] = $this->model->find($id);
        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', $this->panel . ' successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route($this->base_route . 'index');
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
        return redirect()->route($this->base_route . 'index');
    }

    public function facilities()
    {
        $facility = $this->model::all();
        return response()->json($facility);
    }

    public function trash()
    {
        // dd('hello');
        $this->title = 'Trash';
        $data['title'] = 'Trash List';
        $data['rows'] = $this->model->onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view($this->__loadDataToView($this->folder . 'trash'), compact('data'));
    }

    public function restore($id)
    {

        $data['row'] =  $this->model->withTrashed()->find($id)->restore();;

        if ($data['row']) {
            request()->session()->flash('success', $this->panel . ' successfully restored');
        } else {
            request()->session()->flash('error', 'Error in creating' . $this->panel);
        }
        return redirect()->route($this->base_route . 'index');
    }
    public function forceDelete($id)
    {

        $data['row'] =  $this->model->where('id', $id)->withTrashed()->first();

        if ($data['row']->forceDelete()) {
            request()->session()->flash('success', $this->panel . ' premanently deleted');
        } else {
            request()->session()->flash('error', 'Error in deleting' . $this->panel);
        }
        return redirect()->route($this->base_route . 'index');
    }
}
