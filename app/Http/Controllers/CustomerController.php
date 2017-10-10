<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    private $customers, $date, $limit = 10;

    public function __construct( Customer $customers){
        $this->customers = $customers;

        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customers->orderBy('cust_id', 'desc')->paginate($this->limit);
        return view('backend.layout_inven.customer.reportCustomer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layout_inven.customer.createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customers->cust_name     = $request->cust_name;
        $this->customers->cust_gender   = $request->sex;
        $this->customers->cust_tel      = $request->cust_tel;
        $this->customers->cust_address  = $request->cust_address;
        $this->customers->city          = $request->city;
        $this->customers->company       = $request->company;
        $this->customers->registerDate  = $this->date;
        $this->customers->save();
        $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Create Customer Success!</strong>
                                                </div>');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = preg_replace( '#[^0-9]#', '', $id);

         if ($id !="" && !empty($id)) {
             $customer = $this->customers->where('cust_id', $id)->first();
             if ($customer) {
                 return view('backend.layout_inven.customer.detailCustomer', compact('customer'));
             }
         }

         return redirect('customer/list.html');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = preg_replace( '#[^0-9]#', '', $id);

        if ($id !="" && !empty($id)) {
            $customer = $this->customers->where('cust_id', $id)->first();
            if ($customer) {
                return view('backend.layout_inven.customer.editCustomer', compact('customer'));
            }
        }

        return redirect('customer/list.html');
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
        $id = preg_replace( '#[^0-9]#', '', $request->cust_id);

        if (!empty($id)) {
            $this->customers->where('cust_id', $id)->update([
                        'cust_name'     => $request->cust_name,
                        'cust_gender'   => $request->cust_gender,
                        'cust_tel'      => $request->cust_tel,
                        'cust_address'  => $request->cust_address,
                        'city'          => $request->city,
                        'company'       => $request->company,
                        'registerDate'  => $this->date
            ]);
            $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Update Customer Successful!</strong>
                                                </div>');

            return back();
        }
        return redirect('customer/list.html');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Customer::find($id)->delete();
        return redirect('customer/list.html');
    }
}
