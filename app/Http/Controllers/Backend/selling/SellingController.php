<?php

namespace App\Http\Controllers\Backend\selling;

use App\Customer;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class SellingController extends Controller
{
    private $products, $date;
    public function __construct( Product $products){
        $this->products = $products;
        $this->date = date('Y-m-d');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cartItem = Cart::content();
        $products = $this->products->all();
        return view('backend.sellings.index', compact('products', 'cartItem'));
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
        //
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function clear()
    {
        $cartItems = Cart::content();
        foreach ($cartItems as $key => $cartItem) {
            Cart::remove($cartItem->rowId);
        }
        return redirect('admin/sellings');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $product = Product::find($id);
        Cart::add($id, $product->pro_name, 1, $product->pro_price );
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        Cart::update($request->id, $request->pro_qty);
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }

    public function getProduct() {

        $products = Product::select(['pro_id', 'pro_name', 'pro_quantity', 'pro_price']);
        return Datatables::of($products)
            ->addColumn('action', function ($product) {
                return '<a href="'.route("admin.sellings.edit", $product->pro_id).'" class="btn btn-xs btn-primary btn-add-product">Add</a>';
            })
            ->escapeColumns(['action'])
            ->editColumn('pro_price', '$ {{number_format($pro_price, 2)}}')
            ->make();
    }
    
}
