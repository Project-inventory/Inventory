<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Order;
use App\Product;
use App\Supplier;
use App\Brand;
use App\Category;
use App\Group;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $count_customer = Customer::all()->count();
        $count_supplier = Supplier::all()->count();
        $count_product = Product::all()->count();
        $count_brand = Brand::all()->count();
        $count_category = Category::all()->count();
        $count_group = Group::all()->count();
        $count_sale = Order::all()->count();
        return view('backend.dashboard',compact('count_customer', 
                                                'count_supplier', 
                                                'count_product', 
                                                'count_brand',
                                                'count_category',
                                                'count_group',
                                                'count_sale'));
    }
}
