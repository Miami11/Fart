@extends('admin.layout.app')
@section('title', 'product index')
@extends('admin.layout.nav')
@section('content')

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif


                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>

                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>

                                        <a class="btn btn-info"
                                           href="{{ route('products.show',$product->id) }}">Show</a>
                                        <a class="btn btn-primary"
                                           href="{{ route('products.edit',$product->id) }}">Edit</a>
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}"
                                              enctype="multipart/form-data">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            {!! $products->links() !!}
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    <!-- /#page-wrapper -->
@endsection