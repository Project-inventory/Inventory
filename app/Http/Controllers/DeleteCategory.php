<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class DeleteCategory extends Controller
{
    public function destroy($id){
        Category::find($id)->delete();
        return redirect()->route('showFields');
    }
}
