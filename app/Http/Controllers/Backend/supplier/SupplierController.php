<?php

namespace App\Http\Controllers\Backend\supplier;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class SupplierController extends Controller
{
    private $suppliers, $date;
    public function __construct(Supplier $suppliers) {
        $this->suppliers = $suppliers;
        $this->date = date('Y-m-d H:i:s');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = $this->suppliers->all();
        return view('backend.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->suppliers->ven_name          = $request->ven_name;
        $this->suppliers->ven_company       = $request->ven_company;
        $this->suppliers->ven_address       = $request->ven_address;
        $this->suppliers->ven_tel           = $request->ven_tel;
        $this->suppliers->ven_website       = $request->ven_website;
        $this->suppliers->ven_status        = $request->ven_status;
        $this->suppliers->ven_description   = $request->ven_description;
        $this->suppliers->insert_date       = $this->date;
        $this->suppliers->save();
        $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Create Supplier Success!</strong>
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
            $supplier = $this->suppliers->where('ven_id', $id)->first();
            if ($supplier) {
                return view('backend.suppliers.edit', compact('supplier'));
            }
        }
        return redirect('admin/suppliers');
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
        $id = preg_replace( '#[^0-9]#', '', $request->ven_id);

        if (!empty($id)) {
            $this->suppliers->where('ven_id', $id)->update([
                'ven_name'        => $request->ven_name,
                'ven_company'     => $request->ven_company,
                'ven_address'     => $request->ven_address,
                'ven_tel'         => $request->ven_tel,
                'ven_website'     => $request->ven_website,
                'ven_status'      => $request->ven_status,
                'ven_description' => $request->ven_description,
                'insert_date'     => $this->date
            ]);
            $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Update Supplier Successful!</strong>
                                                </div>');

            return back();
        }
        return redirect('admin/suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return back();
    }
    
    public function getSupplier()
    {
        $suppliers = Supplier::select(['ven_id', 'ven_name', 'ven_address', 'ven_tel']);
        return Datatables::of($suppliers)
            ->addColumn('action', function ($supplier) {
                return '<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view'.$supplier->ven_id.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                <a href="'.route("admin.suppliers.edit", $supplier->ven_id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="'.route("admin.suppliers.delete", $supplier->ven_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
