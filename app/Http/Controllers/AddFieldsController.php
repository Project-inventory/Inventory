<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Group;
use Illuminate\Http\Request;
class AddFieldsController extends Controller
{
    public function postField()
    {
        return view('backend.layout_inven.fields.addfields');
    }

    public function showFields() {
        $group = Group::all();
        $brand = Brand::all();
        $cat = Category::all();
        return view('backend.layout_inven.fields.showFields', compact('group', 'brand', 'cat'));
    }
    
    public function createGroup(Request $request) {
        $gp = new Group;
        $gp->gp_name = $request->groups;
        Group::insert(['gp_name'=>$request->groups]);
        return back();
    }

    public function createCat(Request $request) {
        $cat = new Category;
        $cat->cat_name = $request->cats;
        Category::insert(['cat_name'=>$request->cats]);
        return back();
    }

    public function createBrand(Request $request) {
        $bn = new Brand;
        $bn->brand_name = $request->brands;
        Brand::insert(['brand_name'=>$request->brands]);
        return back();;
    }
}
