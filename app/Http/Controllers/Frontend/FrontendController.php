<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Menu;
use App\Products;
use App\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    protected $frontendPath='frontend';
    protected $pagepath='';
    public function __construct()
    {

        $menu=Menu::all();
        $this->data('menuData',$menu);

        $categoryData = Category::all();
        $this->data('categoryData', $categoryData);

        $productData=Products::orderBy('id','asc')->get();
        $this->data('productData',$productData);

        $sliderData=Sliders::where('status','=',1)->get();
        // $sliderData = Sliders::orderBy('id', 'asc')->get();
        $this->data('sliderData', $sliderData);


        $productlatestData = Products::orderBy('id', 'asc')->paginate(4);
        $this->data('productlatestData', $productlatestData);

        $productfeatureData = Products::orderBy('id', 'asc')->paginate(4);
        $this->data('productfeatureData', $productfeatureData);

        $productpopularData = Products::orderBy('id', 'desc')->paginate(4);
        $this->data('productpopularData', $productpopularData);


        $this->pagepath=$this->frontendPath.'.pages.';

    }
}
