<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends BackendController
{
    public function index(){
        $CategoryData=Category::orderBy('id','ASC')->get();
        $this->data('categoryData',$CategoryData);
        return view($this->pagepath.'category.show-category',$this->data);
    }
    public function addCategory(Request $request){
        if($request->isMethod('get')){
            return view($this->pagepath.'category.add-category',$this->data);
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'category_name'=>'required|max:100|min:3'
            ]);
            $data['category_name']=$request->category_name;
            if(Category::create($data)){
                return redirect()->back()->with('success','Category was inserted' );
            }
        }
        

    }
    public function deleteCategory(Request $request){
        $criteria=$request->criteria;
        $category=Category::findOrFail($criteria);
        if($category->delete()){
            Session::flash('success','Category was delete');
            return redirect()->back();
        }
    }
}
