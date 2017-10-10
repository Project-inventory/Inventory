@extends('backend.layouts.app')
@section('content')
    <div class="box box-success col-md-4">
        <div class="box-header with-border">
            <h3 class="box-title">Supplier's List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div>
                <a href="{{ URL::to('supplier/create.html') }}" class="btn btn-info">Add New Supplier</a>

            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suppliers as $key=>$supplier)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $supplier->ven_name }}</td>
                        <td>{{ $supplier->ven_address }}</td>
                        <td>{{ $supplier->ven_tel }}</td>
                        <td>
                            <a href="{{URL::to('supplier').'/show/'.$supplier->ven_id}}" class="btn btn-primary">View</a>
                            <a href="{{URL::to('supplier').'/edit/'.$supplier->ven_id}}" class="btn btn-success">Edit</a>
                            <a href="{{URL::to('supplier').'/delete/'.$supplier->ven_id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<div id="paginate">--}}
                {{--{!! $supplier->appends(['txtSearch' => Request::get('txtSearch')])->links() !!}--}}
            {{--</div>--}}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection