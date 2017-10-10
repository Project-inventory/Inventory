<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class DeleteGroup extends Controller
{
    public function destroy($id){
        Group::find($id)->delete();
        return redirect()->route('showFields');
    }
}
