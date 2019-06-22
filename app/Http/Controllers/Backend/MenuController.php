<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MenuController extends BackendController
{


    public function index()
    {
        $menuData = Menu::orderBy('id', 'ASC')->get();
        $this->data('menuData', $menuData);
        return view($this->pagepath . 'menu.show-menu', $this->data);
    }

    public function addMenu(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagepath . 'menu.add-menu', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'menu_name' => 'required|max:100|min:3',

            ]);
            $data['menu_name'] = $request->menu_name;

            if (Menu::create($data)) {
                // return redirect()->route('add-user')->with('success', 'Data is inserted');
                return redirect()->back()->with('success', 'Slider is inserted');
            }
        }
    }
    public function deleteMenu(Request $request)
    {
        $criteria=$request->criteria;
        $menu=Menu::findOrFail($criteria);
        if($menu->delete()){
            Session::flash('success', 'Menu was delete');
            return redirect()->back();
        }
    }


}