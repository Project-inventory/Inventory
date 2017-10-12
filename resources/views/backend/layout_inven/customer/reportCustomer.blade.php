@extends('backend.layouts.app')
@section('content')
    <div class="box box-success col-md-4">
        <div class="box-header with-border">
            <h3 class="box-title">Customer's List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ URL::to('customer/create.html') }}" class="btn btn-info pull-left">Add New Customer</a>
                </div>
                <div class="input-group pull-right col-md-6">
                    <form method="get" action="{{ URL::to('customer/search') }}" role="search" accept-charset="UTF-8">
                        <div class="form-group">
                            <div class="input-group col-sm-12 col-xs-12">
                                <input type="text" name="customerSearch" id="customerSearch" class="form-control" placeholder="Search name, tel, city or company...">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default" id="btnSearch"><i><span class="glyphicon glyphicon-search"></span></i></button>
                                </div><!-- /itnput-group-btn -->
                            </div>	<!-- /input-group -->
                        </div><!-- /form-group -->
                    </form>
                </div>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key=>$customer)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customer->cust_name }}</td>
                            <td>{{ $customer->cust_gender }}</td>
                            <td>{{ $customer->cust_tel }}</td>
                            <td>
                                <a href="{{URL::to('customer').'/show/'.$customer->cust_id}}" class="btn btn-primary">View</a>
                                <a href="{{URL::to('customer').'/edit/'.$customer->cust_id}}" class="btn btn-success">Edit</a>
                                <a href="{{URL::to('customer').'/delete/'.$customer->cust_id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="paginate">
                {!! $customers->appends(['customerSearch' => Request::get('customerSearch')])->links() !!}
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection