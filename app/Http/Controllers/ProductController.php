<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Group;
use App\Product;
use App\FileUpload;
use File;
use Storage;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    private $products, $date, $limit = 7;
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
        $products = $this->products->orderBy('pro_id', 'desc')->paginate($this->limit);
        return view('backend.layout_inven.product.reportProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $groups = Group::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.layout_inven.product.createProduct', compact('groups', 'brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('pro_photo')) {
            $pro_photo = $request->file('pro_photo');
            $photoName = $pro_photo->getClientOriginalName();
            $filename = time().$photoName;
//            dd($filename);
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
        return redirect('product/list.html');
//        return view('backend.layout_inven.product.reportProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id !="" && !empty($id)) {
            $product = $this->products->where('pro_id', $id)->first();
            if ($product) {
                return view('backend.layout_inven.product.detailProduct', compact('product'));
            }
        }
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
            $product = $this->products->where('pro_id', $id)->first();
            if ($product) {
                $groups = Group::all();
                $brands = Brand::all();
                $categories = Category::all();
                return view('backend.layout_inven.product.editProduct', compact('product', 'groups', 'brands', 'categories'));
            }
        }
        return redirect('product/list.html');
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
        $id = preg_replace( '#[^0-9]#', '', $request->pro_id);

        if (!empty($id)) {
            $this->products->where('pro_id', $id)->update([
                'pro_name'           => $request->pro_name,
                'pro_unit'           => $request->pro_unit,
                'pro_quantity'       => $request->pro_quantity,
                'pro_price'          => $request->pro_price,
                'pro_barcode'        => $request->pro_barcode,
                'pro_expiry'         => $request->pro_expiry,
                'pro_tax'            => $request->pro_tax,
                'pro_photo'          => $request->pro_photo,
                'gp_id'              => $request->gp_id,
                'cat_id'             => $request->cat_id,
                'brand_id'           => $request->brand_id
            ]);
            $request->session()->flash('message', ' <div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Update Product Successful!</strong>
                                                </div>');

            return back();
        }
        return redirect('product/list.html');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('product/list.html');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function search(Request $request) {
        $productKey = $request->get('productSearch');
        if(!empty($productKey)) {
            $products = $this->products->join('groups', 'groups.gp_id','=', 'products.gp_id')
                                        ->join('categories', 'categories.cat_id','=', 'products.cat_id')
                                        ->join('brands', 'brands.brands_id','=', 'products.brand_id')
                                        ->where('pro_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('pro_quantity', '=', $productKey)
                                        ->orwhere('pro_price', '=', $productKey)
                                        ->orwhere('pro_barcode', '=', $productKey)
                                        ->orwhere('pro_date_storage', '=', $productKey)
                                        ->orwhere('pro_expiry', '=', $productKey)
                                        ->orwhere('gp_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('cat_name', 'like', '%'.$productKey.'%')
                                        ->orwhere('brand_name', 'like', '%'.$productKey.'%')
                                        ->orderBy('pro_id', 'desc')
                                        ->paginate($this->limit);
            dd($products);
            return view('backend.layout_inven.product.reportProduct', compact('products'));
        }else {
            return redirect('product/list.html');
        }
    }
}
