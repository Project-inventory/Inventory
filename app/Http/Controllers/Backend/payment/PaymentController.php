<?php

namespace App\Http\Controllers\Backend\payment;

use App\Customer;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    private $products, $date, $orders, $customers, $create_date;
    public function __construct( Product $products, Order $orders, Customer $customers){
        $this->orders  = $orders;
        $this->customers = $customers;
        $this->products = $products;
        $this->date = date('Y-m-d H:i:s');
        $this->create_date = date('Y-m-d');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cartItems = Cart::content();
        if (count($cartItems) == 0) {
            $request->session()->flash('message', ' <div class="alert alert-danger">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <h4>Please!! Choose the product first before payment, Thank you!!</h4>
                                                </div>');
            return redirect('admin/sellings');
            
        }else {
            foreach ($cartItems as $key => $cartItem) {
                $updateQtys = $this->products->where('pro_id', $cartItem->id)->get();
            }
            $products = $this->products->all();
            $customers = $this->customers->all();
            return view('backend.payments.index', compact('products', 'cartItems', 'updateQtys', 'customers'));
        }
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
                'pro_name'          => $cartItem->name,
                'cust_name'         => $request->select_customer,
                'order_quantity'    => $cartItem->qty,
                'order_tax'         => $request->order_tax,
                'order_subtotal'    => $request->order_subtotal,
                'order_amount'      => $request->order_amount,
                'discount'          => $request->discount,
                'paid'              => $request->paid,
                'change'            => $request->change,
                'order_date'        => $this->date,
                'user_name'         => $request->user_name,
                'create_at'         => $this->create_date
            ];
            $updateQty = $this->products->where('pro_id', $cartItem->id);
            $updateQty->decrement('pro_quantity', $cartItem->qty);

            Cart::remove($cartItem->rowId);
        }
        $this->orders->insert($dataInsert);
        return redirect('admin/sellings');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
