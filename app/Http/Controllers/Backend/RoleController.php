<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends BackendBaseController
{
    protected $panel = 'Role';  //for section/moudule
    protected $folder = 'backend.role.'; //for view file
    protected $base_route = 'backend.role.'; //for route method
    protected $title;
    protected $model = 'Role';

    function __construct()
    {
        $this->model = new Role();
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


    public function store(Request $request)
    {

        $request->request->add(['created_by' => Auth::user()->id]);

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

        $request->request->add(['updated_by' => Auth::user()->id]);

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



    public function assignRole($id)
    {
        $data['row'] = $this->model->find($id);
        //fetching assigned permissions
        $data['assigned_permissions'] = $data['row']->permissions()->pluck('permission_id')->toArray();

        $data['modules'] = Module::all();
        if (!$data['row']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'Assign';
        return view($this->__loadDataToView($this->folder . 'assign'), $data);
    }

    public function postPermission(Request $request)
    {
        $data['row'] = Role::find($request->role_id);
        $data['row']->permissions()->sync($request->permission_id);
        return redirect()->route($this->base_route . 'index');
    }
}
