<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BackendController
{
    public function index(){
        $productData=Products::orderBy('id','ASC')->get();
        $this->data('productData',$productData);
        return view($this->pagepath.'product.show-product',$this->data);

    }
    public function addProduct(Request $request){
        if ($request->isMethod('get')) {
            $this->data('categoryData',Category::all());
            return view($this->pagepath . 'Product.add-product', $this->data);
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|max:1000|min:3',
                'description'=>'required|max:1000|min:3',
                'upload'=>'required|mimes:jpg,jpeg,png,gif',
                'date'=>'required|date',
                'qty'=>'required'
            ]);
            $data['name']=$request->name;
            $data['slug']=$request->slug;
            $data['price']=$request->price;
            $data['description']=$request->description;
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('lib/uploads/images/product');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }
            $data['date']=$request->date;
            $data['qty']=$request->qty;
            $data['category_id']=$request->category_id;

        }
        if(Products::create($data)){
            return redirect()->back()->with('success', 'Product is inserted');
        }

    }

    public function deleteFile($id){
        $criteria=$id;
        $findData=Products::findOrFail($criteria);
        $filename=$findData->image;
        $deletePath=public_path('lib/uploads/images/product/'.$filename);
        if(file_exists($deletePath)&&is_file($deletePath)){
            return unlink($deletePath);
        }
        return true;

    }
    public function deleteProduct(Request $request){
        $criteria=$request->criteria;
        $findData=Products::findOrFail($criteria);
        if($this->deleteFile($criteria)&&($findData->delete())){
            return redirect()->back()->with('success','Product is Delete');
        }
    }
}
