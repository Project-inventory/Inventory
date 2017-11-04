<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.configurations.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gp = new Group;
        $gp->gp_name = $request->groups;
        Group::insert(['gp_name'=>$request->groups]);
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
        Group::find($id)->delete();
        return back();
    }

    public function getGroups()
    {

        $groups = Group::select(['gp_id','gp_name']);
        return Datatables::of($groups)
            ->addColumn('action', function ($group) {
                return '<a href="'.route("admin.groups.delete", $group->gp_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
