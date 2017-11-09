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
        $count_member = Customer::all()->where('status', '= ', 'member')->count();
        $members = $this->members();
        
        $count_supplier = Supplier::all()->count();
        
        $count_product = Product::all()->count();
        $count_lowProduct = Product::all()->where('pro_quantity', '<=', 10)->count();
        $lowProducts = $this->lowProducts();
            
        $count_brand = Brand::all()->count();
        $count_category = Category::all()->count();
        $count_group = Group::all()->count();
        $count_sale = Order::all()->count();
        return view('backend.dashboard',compact('count_customer',
                                                'count_member',
                                                'members',
        
                                                'count_supplier',
        
                                                'count_product', 
                                                'count_lowProduct',
                                                'lowProducts',
        
                                                'count_brand',
                                                'count_category',
                                                'count_group',
                                                'count_sale'));
    }

    protected function members() {

        $count_customer = Customer::all()->count();
        $count_member = Customer::all()->where('status', '= ', 'member')->count();

        return $member = ($count_member*100)/$count_customer;
    }

    protected function lowProducts() {
        $count_product = Product::all()->count();
        $count_lowProduct = Product::all()->where('pro_quantity', '<=', 10)->count();
        return $lowProduct = ($count_lowProduct * 100)/$count_product;
    }
}
