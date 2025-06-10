@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Buying Price</th>
                                            <th>Regular Price</th>
                                            <th>Discount Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- use loop $categories --}}
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                    {{-- <img src="{{asset($category->image)}}"> --}}
                                                    <img src="{{asset('backend/images/product/'.$product->image)}}"
                                                        height="100" weight="100">
                                                </td>
                                                <td>{{$product->name}}</td>
                                                {{-- <td>{{$product->cat_id}}</td> --}}
                                                <td>{{$product->category->name}}</td>
                                                {{-- <td>{{$product->sub_cat_id}}</td> --}}
                                                <td>{{$product->subCategory->name?? "NA"}}</td>
                                                <td>{{$product->buying_price}}</td>
                                                <td>{{$product->regular_price}}</td>
                                                <td>{{$product->discount_price}}</td>
                                                <td>{{$product->qty}}</td>
                                                <td>
                                                    <a href="{{url('/admin/product/edit/'.$product->id)}}"
                                                        class="btn btn-primary">Edit</a>
                                                    {{-- <a href="{{url('/admin/category/delete/{id}')}}" class="btn btn-danger">Delete</a> --}}
                                                    <a href="{{url('/admin/product/delete/'.$product->id)}}"
                                                        onclick="return confirm('Are You Sure!!!')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
