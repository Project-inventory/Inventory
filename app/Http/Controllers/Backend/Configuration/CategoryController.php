<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class CategoryController extends Controller
{
    private $categories;
    public function __construct(Category $categories) {
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->all();
        return view('backend.configurations.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category;
        $cat->cat_name = $request->cats;
        Category::insert(['cat_name'=>$request->cats]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        $categories = Category::select(['cat_id','cat_name']);
        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                return ' <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit'.$category->cat_id.'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                         <a href="'.route("admin.categories.delete", $category->cat_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}