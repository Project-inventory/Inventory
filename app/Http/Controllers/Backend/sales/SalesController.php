<?php

namespace App\Http\Controllers\Backend\sales;

use App\Customer;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class SalesController extends Controller
{
    private $orders;
    public function __construct( Order $orders){
        $this->orders = $orders;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orders->all();
        return view('backend.sales.index', compact('orders'));
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
    public function edit($id)
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
    public function update(Request $request, $id)
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

    }

    public function getSales ()
    {
        $orders = $this->orders
            ->select(['order_id','pro_id', 'pro_name', 'cust_name', 'order_quantity', 'order_date']);
        return Datatables::of($orders)
            ->addColumn('action', function ($order) {
                return '<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view'.$order->order_id.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
