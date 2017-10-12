<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    private $products, $date, $limit = 5;
    public function __construct( Product $products){
        $this->products = $products;
        $this->date = date('Y-m-d');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $currentPage = isset($_GET['page']) ?$_GET['page']:1;
//        $offser = ($currentPage * $this->limit) - $currentPage;
//        $search = isset($_GET['search']) ? $_GET['search']:'';

        $cartItem = Cart::content();
        // dd($cartItem);
//        $products = $this->products ->join('groups', 'groups.gp_id','=', 'products.gp_id')
//                                    ->join('categories', 'categories.cat_id','=', 'products.cat_id')
//                                    ->join('brands', 'brands.brands_id','=', 'products.brand_id')
//                                    ->where('pro_name', 'like', '%'.$search.'%')
//                                    ->orwhere('pro_quantity', '=', $search)
//                                    ->orwhere('pro_price', '=', $search)
//                                    ->orwhere('pro_barcode', '=', $search)
//                                    ->orwhere('gp_name', 'like', '%'.$search.'%')
//                                    ->orwhere('cat_name', 'like', '%'.$search.'%')
//                                    ->orwhere('brand_name', 'like', '%'.$search.'%');
//        $totalProduct = $products->data->total;
//        $product = $products->data->list;
//        $paginator = new Paginator(
//            intval($totalProduct), 10, $currentPage,
//            'order/product?search='.$search.'&page=(num)'
//        );
        $products = $this->products->orderBy('pro_id', 'desc')->paginate($this->limit);
        return view('backend.layout_inven.order.reportOrder', compact('products', 'cartItem', 'product', 'limit', 'paginator', 'totalProduct'));
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
    public function edit($pro_id)
    {
        $product = Product::find($pro_id);
        Cart::add($pro_id, $product->pro_name, 1, $product->pro_price );
        return redirect('order/list.html');
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
        Cart::update($id, $request->pro_qty);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
//======================================================================================================================
    public function search(Request $request) {
        $productKey = $request->get('orderSearch');
//        dd($productKey);
        if(!empty($productKey)) {
            $cartItem = Cart::content();
            $products = $this->products ->join('groups', 'groups.gp_id','=', 'products.gp_id')
                                        ->join('categories', 'categories.cat_id','=', 'products.cat_id')
                                        ->join('brands', 'brands.brands_id','=', 'products.brand_id')
                                        ->where('pro_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('pro_quantity', '=', $productKey)
                                        ->orwhere('pro_price', '=', $productKey)
                                        ->orwhere('pro_barcode', '=', $productKey)
                                        ->orwhere('gp_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('cat_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('brand_name', 'like', '%'.$productKey.'%')
                                        ->orderBy('pro_id', 'desc')
                                        ->paginate($this->limit);
                                    return view('backend.layout_inven.order.reportOrder', compact('products', 'cartItem'));
        }else {
            return redirect('order/list.html');
        }
    }

}
