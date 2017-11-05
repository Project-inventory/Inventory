<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class GroupController extends Controller
{
    private $groups;
    public function __construct(Group $groups) {
        $this->groups = $groups;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groups->all();
        return view('backend.configurations.groups.index', compact('groups'));
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
                return ' <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit'.$group->gp_id.'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                         <a href="'.route("admin.groups.delete", $group->gp_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
