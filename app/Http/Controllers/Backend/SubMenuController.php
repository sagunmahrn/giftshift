<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\SubMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubMenuController extends BackendController
{
    public function index()
    {
        $SubMenuData = SubMenu::orderBy('id', 'DESC')->get();
        $this->data('SubMenuData', $SubMenuData);
        return view($this->pagepath . 'SubMenu.show-SubMenu', $this->data);
    }

    public function addSubMenu(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('menuData',Menu::all());

            return view($this->pagepath . 'SubMenu.add-SubMenu', $this->data);
        }

        if ($request->isMethod('post')) {  //form submit garna lagda..
            $this->validate($request, [
                'submenu_name' => 'required|min:3|max:50'
            ]);

            $data['submenu_name'] = $request->submenu_name;
            $data['menu_id'] = $request->menu_id;


            if (SubMenu::create($data)) {
                return redirect()->back()->with('success', 'Sub Menu is created');
            }
        }
    }
    public function deleteSubMenu(Request $request)
    {
        $criteria=$request->criteria;
        $submenu=SubMenu::findOrFail($criteria);
        if($submenu->delete()){
            Session::flash('success', 'SubMenu was delete');
            return redirect()->back();
        }
    }


}
