<?php

namespace App\Http\Controllers\Backend\payment;

use App\Customer;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PaymentController extends Controller
{
    private $products, $date, $orders;
    public function __construct( Product $products, Order $orders, Customer $customers){
        $this->orders  = $orders;
        $this->customers = $customers;
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
        $cartItems = Cart::content();
        foreach ($cartItems as $key=>$cartItem) {
            $updateQtys = Product::where('pro_id', $cartItem->id)->get();
        }
        $products = $this->products->all();
        $customers = $this->customers->all();
        return view('backend.payments.index', compact('products', 'cartItems', 'updateQtys', 'customers'));
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $cartItems = Cart::content();
        $dataInsert = [];
        foreach ($cartItems as $key=>$cartItem) {
            $dataInsert[] = [
                'pro_id'            => $cartItem->id,
                'cust_id'           => $request->select_customer,
                'order_quantity'    => $cartItem->qty,
                'order_tax'         => $request->order_tax,
                'order_subtotal'    => $request->order_subtotal,
                'order_amount'      => $request->order_amount,
                'discount'          => $request->discount,
                'paid'              => $request->paid,
                'change'            => $request->change,
                'order_date'        => $this->date,
                'user_name'         => $request->user_name
            ];
            $updateQty = Product::where('pro_id', $cartItem->id);
            $updateQty->decrement('pro_quantity', $cartItem->qty);

            Cart::remove($cartItem->rowId);
        }
        $this->orders->insert($dataInsert);
        return redirect('admin/sellings');

    }


    /**
     * @return \Illuminate\Http\Response
     */
    function fun_print()
    {
        $pdf = PDF::loadView('backend.payments.test');
        return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backend.payments.test');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        //
    }
}
