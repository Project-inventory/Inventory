<?php

namespace App\Http\Controllers\Backend\product;

use App\Brand;
use App\Category;
use App\Group;
use App\Product;
use App\FileUpload;
use File;
use Storage;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ProductController extends Controller
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
        $products = $this->products->all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $groups = Group::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.products.create', compact('groups', 'brands', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('pro_photo')) {
            $pro_photo = $request->file('pro_photo');
            $photoName = $pro_photo->getClientOriginalName();
            $filename = time().$photoName;
            $path = public_path('product_img/'.$filename);
            Image::make($pro_photo->getRealPath())->resize(200, 200)->save($path);
        }else {
            $filename = "N/A";
        }

        $this->products->pro_name           = $request->pro_name;
        $this->products->pro_unit           = $request->pro_unit;
        $this->products->pro_quantity       = $request->pro_quantity;
        $this->products->pro_date_storage   = $this->date;
        $this->products->pro_price          = $request->pro_price;
        $this->products->pro_barcode        = $request->pro_barcode;
        $this->products->pro_expiry         = $request->pro_expiry;
        $this->products->pro_tax            = $request->pro_tax;
        $this->products->pro_photo          = $filename;
        $this->products->gp_id              = $request->gp_id;
        $this->products->cat_id             = $request->cat_id;
        $this->products->brand_id           = $request->brand_id;
        $this->products->save();

        $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Create Product Success!</strong>
                                                </div>');
        return back();
    }

    /**
     * @param $id
     */
    public function show($id)
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = preg_replace( '#[^0-9]#', '', $id);

        if ($id !="" && !empty($id)) {
            $product = $this->products->where('pro_id', $id)->first();
            if ($product) {
                $groups = Group::all();
                $brands = Brand::all();
                $categories = Category::all();
                return view('backend.products.edit', compact('product', 'groups', 'brands', 'categories'));
            }
        }
        return redirect('admin/products');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = preg_replace( '#[^0-9]#', '', $request->pro_id);

        if (!empty($id)) {

            if ($request->hasFile('pro_photo')) {
                $pro_photo = $request->file('pro_photo');
                $photoName = $pro_photo->getClientOriginalName();
                $filename = time().$photoName;
                $path = public_path('product_img/'.$filename);
                Image::make($pro_photo->getRealPath())->resize(200, 200)->save($path);
            }else {
                $filename = "N/A";
            }

            $this->products->where('pro_id', $id)->update([
                'pro_name'           => $request->pro_name,
                'pro_unit'           => $request->pro_unit,
                'pro_quantity'       => $request->pro_quantity,
                'pro_price'          => $request->pro_price,
                'pro_barcode'        => $request->pro_barcode,
                'pro_expiry'         => $request->pro_expiry,
                'pro_tax'            => $request->pro_tax,
                'pro_photo'          => $filename,
                'gp_id'              => $request->gp_id,
                'cat_id'             => $request->cat_id,
                'brand_id'           => $request->brand_id
            ]);
            $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Update Product Successful!</strong>
                                                </div>');

            return redirect('admin/products');
        }
        return redirect('admin/products');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
    
    public function getProduct() {
        
        $products = Product::select(['pro_id', 'pro_name', 'pro_quantity', 'pro_barcode']);
        return Datatables::of($products)
            ->addColumn('action', function ($product) {
                return '<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view'.$product->pro_id.'">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </button>
                <a href="'.route("admin.products.edit", $product->pro_id).'" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="'.route("admin.products.delete", $product->pro_id).'" class="btn btn-xs btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>';
            })
            ->escapeColumns(['action'])
            ->make();
    }
}
