@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SubCategories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">SubCategories</li>
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
                                <h3 class="card-title">SubCategory List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Sub-Category Name</th>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- use loop $categories --}}
                                        @foreach ($subCategories as $subcategory)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $subcategory->name }}</td>
                                                <td>{{ $subcategory->cat_id }}</td>
                                                <td>{{ $subcategory->category->name }}</td>
                                                <td>
                                                    {{-- <img src="{{asset($category->image)}}"> --}}
                                                    <img src="{{asset('backend/images/category/'.$subcategory->image)}}"
                                                        height="100" weight="100">
                                                </td>
                                                <td>
                                                    <a href="{{url('/admin/sub-category/edit/'.$subcategory->id)}}" class="btn btn-primary">Edit</a>
                                                    {{-- <a href="{{url('/admin/category/delete/{id}')}}" class="btn btn-danger">Delete</a> --}}
                                                    <a href="{{url('/admin/sub-category/delete/'.$subcategory->id)}}" onclick="return confirm('Are You Sure!!!')"
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
