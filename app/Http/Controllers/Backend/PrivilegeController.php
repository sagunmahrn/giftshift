<?php

namespace App\Http\Controllers\Backend;


use App\Privileges;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class PrivilegeController extends BackendController
{
    public function index()
    {
        $this->data('privilegeData',Privileges::orderBy('id','ASC')->get());
        return view($this->pagepath . 'privileges.manage-privilege', $this->data);
    }

    public function addPrivilege(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'privilege_name' => 'required|min:3|max:20|unique:privileges,privilege_name'
            ]);

            $privilegeObject = new Privileges();
            $privilegeObject->	privilege_name = $request->	privilege_name;
            if ($privilegeObject->save()) {
                Session::flash('success', 'Privileges was inserted');
                return redirect()->route('privileges');
            }
            else{
                Session::flash('fail', 'Privileges was not inserted');
                return redirect()->back();
            }
        }

    }

    public function deletePrivilege(Request $request)
    {
            $criteria=$request->criteria;
            $pri=Privileges::findOrFail($criteria);
            if($pri->delete()){
               Session::flash('success', 'Privileges was delete');
              return redirect()->route('privileges');
            }
    }

    public function editPrivilege(Request $request)
    {
       $criteria=$request->criteria;
       $pri=Privileges::findOrFail($criteria);
   $this->data('privilegeData',$pri);
        return view($this->pagepath . 'privileges.edit-privilege', $this->data);
    }

    public function editprivilegeAction(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria=$request->criteria;
            $this->validate($request, [
                'privilege_name' => 'required|min:3|max:20',[
                    Rule::unique('privileges','privilege_name')->ignore($criteria)
                ]
            ]);

            $privilegeObject = Privileges::findOrFail($criteria);
            $privilegeObject->	privilege_name = $request->	privilege_name;
            if ($privilegeObject->update()) {
                Session::flash('success', 'Privileges was Update');
                return redirect()->route('privileges');
            }
            else{
                Session::flash('fail', 'Privileges was not Update');
                return redirect()->back();
            }
        }
    }

    public function updatePrivilegeStatus(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $privilegeObject = Privileges::findOrFail($criteria);
            if (isset($_POST['active'])) {
                $message = "status was inactive";
                $privilegeObject->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $message = "status was active";
                $privilegeObject->status = 1;
            }
            if ($privilegeObject->update()) {
                Session::flash('fail', $message);
                return redirect()->route('privileges');
            }
        }
    }
}
