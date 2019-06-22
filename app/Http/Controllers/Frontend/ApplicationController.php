<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Menu;
use App\Products;
use App\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApplicationController extends FrontendController
{
    public function index()
    {
        $menu = Menu::all();
        $this->data('menuData', $menu);

        $sliderData = Sliders::where('status', '=', 1)->get();
        // $sliderData = Sliders::orderBy('id', 'asc')->get();
        $this->data('sliderData', $sliderData);

        $categoryData = Category::all();
        $this->data('categoryData', $categoryData);

        $productData = Products::orderBy('id', 'asc')->limit(4)->get();
        $this->data('productData', $productData);


        $productlatestData = Products::orderBy('id', 'asc')->paginate(4);
        $this->data('productlatestData', $productlatestData);

        $productfeatureData = Products::orderBy('id', 'asc')->paginate(4);
        $this->data('productfeatureData', $productfeatureData);

        $productpopularData = Products::orderBy('id', 'desc')->paginate(4);
        $this->data('productpopularData', $productpopularData);


        return view($this->pagepath . 'home.home', $this->data);
    }

    public  function aboutus(){
        return view($this->pagepath . 'home.about', $this->data);
    }



    public function sliderDetails(Request $request)
    {
        $criteria = $request->criteria;
        $sliderData = Sliders::where('slug', '=', $criteria)->first();
        $this->data('sliderData', $sliderData);
        return view($this->pagepath . 'slider.slider-details', $this->data);
    }

    public function ProductMore(Request $request)
    {
        $criteria = $request->criteria;
        $productmore = Products::where('slug', '=', '$criteria')->first();
        $this->data('productMore', $productmore);
        return view($this->pagepath . 'product.product-more', $this->data);
    }

    public function productDetails(Request $request)
    {
        $criteria = $request->criteria;
        $productDatails = Products::where('slug', '=', $criteria)->first();
        $this->data('productData', $productDatails);
        return view($this->pagepath . 'product.product-details', $this->data);
    }

    public function ProductByCategory(Request $request)
    {
        $category = $request->category;
        $productbycategory = DB::table('products')
            ->join('categories', 'categories.id', 'products.category_id')
            ->where('categories.category_name', $category)->get();
        $this->data('productData', $productbycategory);
        return view($this->pagepath . 'product.product-by-category', $this->data);

    }
    public function ProductByCategory1(Request $request)
    {
        $category = $request->category;
        $productbycategory = DB::table('products')
            ->join('categories', 'categories.id', 'products.category_id')
            ->where('categories.category_name', $category)->get();

        $this->data('productData', $productbycategory);
        return view($this->pagepath . 'product.product-more', $this->data);

    }

    public function pay(Request $request)
    {
        if ($request->isMethod('get')) {
            $data = Products::findOrFail(1);
//            $data=Products::all();
            return view('abc',compact('data'));
        }
    }


    public function searchData(Request $request)
    {
        $criteria = $request->criteria;

        $result = DB::table('products')
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.category_name')
            ->where('products.name', 'LIKE', '%' . $criteria . '%')
            ->orWhere('products.price', 'LIKE', '%' . $criteria . '%')
            ->orWhere('categories.category_name', 'LIKE', '%' . $criteria . '%')->get();
        $output = '<ul class="list-group">';
        foreach ($result as $item) {
            $output .= "<a href='" . route('search-product-details') . '/' . $item->slug . "'><li class='list-group-item'>" . $item->name . "</li></a>";

        }

        $output .= '</ul>';

        echo $output;


    }

    public function searchDataDetails(Request $request)
    {
        $this->data('productData', Products::where('slug', '=', $request->criteria)->first());
        return view($this->pagepath . 'product.product-details', $this->data);

    }

}
