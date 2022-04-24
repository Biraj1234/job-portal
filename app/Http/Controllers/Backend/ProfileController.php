<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BackendBaseController
{
    protected $panel = 'Profile';  //for section/moudule
    protected $folder = 'backend.profile.'; //for view file
    protected $base_route = 'backend.profile.'; //for route method
    protected $folder_name = 'profile';
    protected $title;
    protected $model = 'Profile';


    function __construct()
    {

        $this->model = new User();
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
        if ($request->hasFile('profile_name')) {
            $oldFile = 'uploads/users/' . $data['row']->profile_picture;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('profile_name');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/users'), $fileName);
            $request->request->add(['profile_picture' => $fileName]);
        }

        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', $this->panel . ' successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating' . $this->panel);
        }
        return redirect()->route($this->base_route . 'show', auth()->user()->id);
    }


    public function destroy($id)
    {
        //
    }
}
