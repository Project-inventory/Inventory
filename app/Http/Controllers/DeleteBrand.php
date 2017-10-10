<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class DeleteBrand extends Controller
{
    public function destroy($id){
        Brand::find($id)->delete();
        return redirect()->route('showFields');
    }
}
