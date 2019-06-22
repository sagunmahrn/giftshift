<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Privileges;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends BackendController
{

    public function index()
    {
        $admins = Admin::orderBy('id', 'ASC')->paginate(5);
        $this->data('usersData', $admins);
        return view($this->pagepath . 'users.show-user', $this->data);

    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {

            $this->data('privilegeData', Privileges::where('status', '=', 1)->get());
            // $this->data('title', $this->setTitle('add-user'));
            return view($this->pagepath . 'users.add-user', $this->data);
        }


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required|min:3|max:10|unique:admins,username',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:8|max:20|confirmed',
                'upload' => 'required|mimes:jpg,jpeg,gif,png',
                'user_type' => 'required',


            ]);
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);


//            if ($request->hasFile('upload')) {
//                $file = $request->file('upload');
//                $ext = $file->getClientOriginalExtension();
//                $imageName = str_random() . '.' . $ext;
//                $uploadPath = public_path('lib/uploads');
//                $makeImage = Image::make($file);
//                $save = $makeImage->resize(500, function ($aspectration) {
//                    $aspectration->aspectRatio();
//                })->crop(300, 250)->save($uploadPath . '/' . $imageName);
//                if ($save) {
//                    ->image = $imageName;
//
//                }
//
//            }

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('lib/uploads/images/admins');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }
            $data['user_type'] = $request->user_type;


            if (Admin::create($data)) {
                // return redirect()->route('add-user')->with('success', 'Data is inserted');
                return redirect()->back()->with('success', 'Data is inserted');
            }
        }
    }
    public function editUser(Request $request)
    {
        $criteria=$request->criteria;
        $user=Admin::findOrFail($criteria);
        $this->data('usersData',$user);
        return view($this->pagepath . 'users.edit-user', $this->data);
    }
    public function edituserAction(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria=$request->criteria;
            $this->validate($request, [
                'name' => 'required|min:3|max:20',
                'username'=>'required|min:3|max:20',[
                    Rule::unique('admins','username')->ignore($criteria)
                ],
                'email'=>'required|email|min:3|max:20',[
                    Rule::unique('admins','email')->ignore($criteria)
                ]
            ]);

            $userObject = Admin::findOrFail($criteria);
            $userObject->	name = $request->	name;
            $userObject->	username = $request->	username;
            $userObject->	email = $request->	email;

            if ($userObject->update()) {
                Session::flash('success', 'User was Updated');
                return redirect()->route('users');
            }
            else{
                Session::flash('fail', 'User was not Update');
                return redirect()->back();
            }
        }
    }


    public function updateType(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $admin = Admin::findorFail($criteria);
            if (isset($_POST['user'])) {
                $admin->user_type = 'admin';
            }
            if(isset($_POST['admin'])) {
                $admin->user_type = 'user';
            }
            if ($admin->update()) {
                return redirect()->back()->with('success', 'User Type is updated successfully');
            }
        }

        return false;

    }

    public function deleteFile($id)
    {
        $criteria = $id;
        $findData = Admin::findOrFail($criteria);
        $filename = $findData->image;
        $deletePath = public_path('lib/uploads/images/admins/' . $filename);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteUser(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Admin::findOrFail($criteria);
        if ($this->deleteFile($criteria) && ($findData->delete())) {

            return redirect()->route('users')->with('success', 'Data is deleted');
        }


    }

    public function updateUserStatus(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $userobject = Admin::findOrFail($criteria);
            if (isset($_POST['active'])) {
                $message = "status was inactive";
                $userobject->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $message = "status was active";
                $userobject->status = 1;
            }
            if ($userobject->update()) {
                Session::flash('fail', $message);
                return redirect()->route('users');
            }
        }
    }
}
