<?php

namespace App\Http\Controllers\Backend\customer;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class CustomerController extends Controller
{
    private $customers, $date;

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
        $customers = $this->customers->all();
        return view('backend.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.create');
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
        $id = preg_replace( '#[^0-9]#', '', $id);

        if ($id !="" && !empty($id)) {
            $customer = $this->customers->where('cust_id', $id)->first();
            if ($customer) {
                return view('backend.customers.edit', compact('customer'));
            }
        }

        return redirect('admin/customers');
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
        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return back();
    }

    public function getCustomer()
    {
        $customers = Customer::select(['cust_id', 'cust_name', 'cust_gender', 'cust_tel']);
        return Datatables::of($customers)
            ->addColumn('action', function ($customer) {
                return '<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view'.$customer->cust_id.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                <a href="'.route("admin.customers.edit", $customer->cust_id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="'.route("admin.customers.delete", $customer->cust_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
