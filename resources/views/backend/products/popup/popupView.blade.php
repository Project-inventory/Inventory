<!-- Modal -->
<div class="modal fade" id="view{{$product->pro_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <td style="width: 30%"><b>Name :</b></td>
                        <td style="width: 40%">{{ $product->pro_name }}</td>
                        <td rowspan="8" style="width: 30%; text-align: center"><img src="{{url('/product_img/'.$product->pro_photo)}}" alt="Image"/></td>
                    </tr>
                    <tr>
                        <td><b>Product unit :</b></td>
                        <td>{{ is_null($product->pro_unit)? 'N/A':$product->pro_unit }}</td>
                    </tr>
                    <tr>
                        <td><b>Quantity :</b></td>
                        <td>{{ $product->pro_quantity }}</td>
                    </tr>
                    <tr>
                        <td><b>Storage Date :</b></td>
                        <td>{{ $product->pro_date_storage }}</td>
                    </tr>
                    <tr>
                        <td><b>Price :</b></td>
                        <td>$ {{ number_format($product->pro_price ,2)}}</td>
                    </tr>
                    <tr>
                        <td><b>Barcode :</b></td>
                        <td>{{ $product->pro_barcode }}</td>
                    </tr>
                    <tr>
                        <td><b>Expiry :</b></td>
                        <td>{{ is_null($product->pro_expiry)?'N/A':$product->pro_expiry }}</td>

                    </tr>
                    <tr>
                        <td><b>Tax :</b></td>
                        <td>{{ is_null($product->pro_tax)? 'N/A':$product->pro_tax }}%</td>
                    </tr>
                    <tr>
                        <td><b>Brand :</b></td>
                        <td>{{is_null($product->brand)?'N/A': $product->brand->brand_name}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Category :</b></td>
                        <td>{{is_null($product->category)?'N/A': $product->category->cat_name}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Group :</b></td>
                        <td>{{is_null($product->group)?'N/A': $product->group->gp_name}}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>