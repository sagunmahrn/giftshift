<?php

namespace App\Http\Controllers\Backend;

use App\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SliderController extends BackendController
{
    public function index(){
        $sliderData=Sliders::orderBy('id','DESC')->paginate(3);
        $this->data('sliderData',$sliderData);
        return view($this->pagepath.'sliders.show-slider',$this->data);
    }
    public function addSlider(Request $request){
        if($request->isMethod('get')){
            return view($this->pagepath.'sliders.addslider',$this->data);
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required|max:100|min:3',
            'description'=>'required|max:1000|min:3',
            'upload'=>'required|mimes:jpg,jpeg,png,gif'
            ]);
            $data['title']=$request->title;
            $data['slug']=$request->slug;
            $data['description']=$request->description;
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('lib/uploads/images/sliders');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }
            if (Sliders::create($data)) {
                // return redirect()->route('add-user')->with('success', 'Data is inserted');
                return redirect()->back()->with('success', 'Slider is inserted');
            }
        }
    }
    public function deleteFile($id)
    {
        $criteria = $id;
        $findData = Sliders::findOrFail($criteria);
        $filename = $findData->image;
        $deletePath = public_path('lib/uploads/images/sliders/' . $filename);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteSlider(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Sliders::findOrFail($criteria);
        if ($this->deleteFile($criteria) && ($findData->delete())) {

            return redirect()->back()->with('success', 'Slider is deleted');
        }


    }
    public function updateSliderStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $slide = Sliders::findOrFail($criteria);
            if (isset($_POST['active'])) {
                $message = "status was inactive";
                $slide->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $message = "status was active";
                $slide->status = 1;
            }
            if ($slide->update()) {
                Session::flash('fail', $message);
                return redirect()->route('slider');
            }
        }
        return false;
    }
}
