<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class BrandController extends Controller
{
    private $brands;
    public function __construct(Brand $brands) {
        $this->brands = $brands;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brands->all();
        return view('backend.configurations.brands.index', compact('brands'));
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
        $bn = new Brand;
        $bn->brand_name = $request->brands;
        Brand::insert(['brand_name'=>$request->brands]);
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
        Brand::find($id)->delete();
        return back();
    }

    public function getBrands() {
        $brands = Brand::select(['brands_id','brand_name']);
        return Datatables::of($brands)
            ->addColumn('action', function ($brand) {
                return ' <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit'.$brand->brands_id.'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                         <a href="'.route("admin.brands.delete", $brand->brands_id).'" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
