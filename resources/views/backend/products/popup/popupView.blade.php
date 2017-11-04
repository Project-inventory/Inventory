<!-- Modal -->
<div class="modal fade" id="view{{$product->pro_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="box-left col-md-3">
                        <p>Name :</p>
                        <p>Product unit :</p>
                        <p>Quantity :</p>
                        <p>Storage Date :</p>
                        <p>Price :</p>
                        <p>Barcode :</p>
                        <p>Expiry :</p>
                        <p>Tax :</p><br>
                    </div>
                    <div class="box-right col-md-4">
                        <p>{{ $product->pro_name }}</p>
                        <p>{{ $product->pro_unit }}</p>
                        <p>{{ $product->pro_quantity }}</p>
                        <p>{{ $product->pro_date_storage }}</p>
                        <p>$ {{ number_format($product->pro_price ,2)}}</p>
                        <p>{{ $product->pro_barcode }}</p>
                        <p>{{is_null($product->pro_expiry)?'N/A':$product->pro_expiry}}</p>
                        <p>{{ $product->pro_tax }}%</p><br>
                    </div>
                    <div class="col-md-5">
                        <img src="{{url('/product_img/'.$product->pro_photo)}}" alt="Image"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Group : {{is_null($product->group)?'N/A': $product->group->gp_name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Category : {{is_null($product->category)?'N/A': $product->category->cat_name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Brand : {{is_null($product->brand)?'N/A': $product->brand->brand_name}}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>