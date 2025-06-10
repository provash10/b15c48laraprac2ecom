@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>

                            <!-- form start -->
                            <form action="{{url('/admin/product/store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Product Name*</label>
                                        <input type="name" class="form-control" name="name" id="name"
                                            placeholder="Enter Product Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Code</label>
                                        <input type="name" class="form-control" name="sku_code" id="sku_code"
                                            placeholder="Enter Product Code">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Select Category*</label>
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Select Sub-Category</label>
                                        <select name="sub_cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($subCategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Multiple Color --}}
                                    <div class="form-group" id="color_fields">
                                        <label for="name">Product Color(Optional)</label>
                                        <input type="text" class="form-control" name="color[]" id="color" placeholder="Enter Product Color">    
                                    </div>
                                        <button type="button" class="btn btn-primary" id="add_color">Add More</button>

                                        {{-- Multiple Size --}}
                                    <div class="form-group" id="size_fields">
                                        <label for="name">Product Size(Optional)</label>
                                        <input type="text" class="form-control" name="size[]" id="size" placeholder="Enter Product Size">    
                                    </div>
                                        <button type="button" class="btn btn-primary" id="add_size">Add More</button>

                                    <div class="form-group">
                                        <label for="name">Product Quantity</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            placeholder="Enter Product Quantity" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Buying Price</label>
                                        <input type="number" class="form-control" name="buying_price" id="buying_price"
                                            placeholder="Enter Buying Price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Regular Price</label>
                                        <input type="number" class="form-control" name="regular_price" id="regular_price"
                                            placeholder="Enter Regular Price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Discount Price</label>
                                        <input type="number" class="form-control" name="discount_price" id="discount_price"
                                            placeholder="Enter Discount Price">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Discription*</label>
                                        <textarea id="summernote1" name="description" class="form-control" required> </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Policy</label>
                                        <textarea id="summernote2" name="policy" class="form-control" required> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select Product Type*</label>
                                        <select name="product_type" class="form-control">
                                            <option selected disabled>Select Type</option>
                                            <option value="hot">Hot Product</option>
                                            <option value="new">New Arrival</option>
                                            <option value="regular">Regular Products</option>
                                            <option value="discount">Discount Products</option>
                                        </select>
                                    </div>

                                    {{-- Single Image --}}
                                    <div class="form-group">
                                        <label for="image">Product Image*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="image" accept="image/*" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Gallery Image --}}
                                    <div class="form-group">
                                        <label for="image">Gallery Image*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="galleryImage[]" multiple
                                                    id="galleryImage" accept="image/*" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <!-- Page specific script -->
    <script>
        $(function() {
            //bsCustomFileInput.init();   >>> id=bsCustomFileInput
            image.init();
        });
    </script>

    <!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote1').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

<script>
  $(function () {
    // Summernote
    $('#summernote2').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

{{-- add color By jQuery --}}
<script>
    $(document).ready(function(){
        $("#add_color").click(function(){
            $("#color_fields").append('<input type="text" class="form-control" name="color[]" id="color" placeholder="Enter Product Color">')
        })
    })
</script>
{{-- add size By jQuery --}}
<script>
    $(document).ready(function(){
        $("#add_size").click(function(){
            $("#size_fields").append('<input type="text" class="form-control" name="size[]" id="size" placeholder="Enter Product Size">')
        })
    })
</script>

@endpush
