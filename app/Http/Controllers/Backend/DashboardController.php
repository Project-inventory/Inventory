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
use Illuminate\Support\Facades\DB;

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

        $monthly_sale = $this->monthly_sale();
        $months = $this->selectMonth();
//        dd($month);
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
                                                'count_sale'))
            ->with('monthly_sale',json_encode($monthly_sale,JSON_NUMERIC_CHECK))
            ->with('months',json_encode($months,JSON_NUMERIC_CHECK));
    }

    protected function members() {

        $count_customer = Customer::all()->count();
        $count_member = Customer::all()->where('status', '= ', 'member')->count();
        if($count_customer <= 0){
            return 0;
        }else {
            return $member = ($count_member * 100) / $count_customer;
        }
    }

    protected function lowProducts() {
        $count_product = Product::all()->count();
        $count_lowProduct = Product::all()->where('pro_quantity', '<=', 10)->count();
        if($count_product <= 0){
            return 0;
        }else {
            return $lowProduct = ($count_lowProduct * 100)/$count_product;
        }

    }

    protected function monthly_sale() {
        $monthly_sale = Order::select(DB::raw('count(create_at) as data'),DB::raw('MONTH(create_at) as month'))
            ->orderBy("create_at")
            ->groupBy('month')
            ->get()->toArray();
        $monthlySale = array_column($monthly_sale, 'data');
        return $monthlySale;
    }

    protected function selectMonth() {
        $month = Order::select(DB::raw('MONTH(create_at) as month'))
            ->orderBy("create_at")
            ->groupBy('month')
            ->get();
        return $month;
    }
}
