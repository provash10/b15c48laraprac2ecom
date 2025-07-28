@extends('master')

@section('content')
    <section class="product-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="product-details-wrapper">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="product-images-slider-outer">
                                        <div class="slider slider-content">
                                            @foreach ($product->galleryImage as $image)
                                                <div>
                                                {{-- <img src="{{asset('/assets/images/product.png')}}" alt="slider images"> --}}
                                                <img src="{{asset('backend/images/galleryImage/'.$image->image)}}" alt="slider images">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="slider slider-thumb">
                                            @foreach ($product->galleryImage as $image)
                                                <div>
                                                <img src="{{asset('backend/images/galleryImage/'.$image->image)}}" alt="slider images">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="product-details-content">
                                        <h3 class="product-name">
                                            {{-- Test Product --}}
                                            {{$product->name}}
                                        </h3>
                                        <div class="product-price">
                                            {{-- <span>300 Tk.</span> --}}
                                            <span>{{$product->discount_price}} Tk</span>
                                            <span class="" style="color: #f74b81;">
                                                {{-- <del>400 Tk.</del> --}}
                                                <del>{{$product->regular_price}} Tk</del>
                                            </span>
                                        </div>
                                        
                                        <form action="" method="POST">
                                            <div class="product-details-select-items-wrap">
                                                @foreach ($product->color as $colorName)
                                                    <div class="product-details-select-item-outer">
                                                   {{-- <input type="radio" name="color" id="color" value="Red" class="category-item-radio"> --}}
                                                   <input type="radio" name="color" id="color" value="{{$colorName->color_name}}" class="category-item-radio">
                                                    <label for="color" class="category-item-label">
                                                     {{-- Red --}}
                                                     {{$colorName->color_name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>

                                        <div class="product-details-select-items-wrap">
                                            @foreach ($product->size as $sizeName)
                                                <div class="product-details-select-item-outer">
                                                {{-- <input type="radio" name="size" value="XXl" class="category-item-radio"> --}}
                                                <input type="radio" name="size" value="{{$sizeName->size_name}}" class="category-item-radio">
                                                {{-- <label for="size" class="category-item-label">XXl</label> --}}
                                                <label for="size" class="category-item-label">{{$sizeName->size_name}}</label>
                                            </div>
                                            @endforeach
                                        </div>

                                            <div class="purchase-info-outer">
                                                <div class="product-incremnt-decrement-outer" style="display: block">
                                                    <a title="Decrement" class="decrement-btn" style="margin-top: -10px;">
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                    <input type="number" readonly name="qty" placeholder="Qty" value="1" min="1" id="qty" style="height: 35px">
                                                    <a title="Increment" class="increment-btn" style="margin-top: -10px;">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                <div>
                                                    <button type="submit" name="action" value="addToCart" id="addToCart" class="cart-btn-inner">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        Add to Cart
                                                    </button>
                                                    <button type="submit" name="action" value="buyNow" id="buyNow" class="cart-btn-inner">
                                                        <i class="fas fa-truck"></i>
                                                        Quick Order
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="product-details-hot-line">
                                            <i class="fas fa-phone-alt"></i>
                                            For Call : 0123456854
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details-info">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                            Description
                                        </button>
                                    </li>
                                    
                                    {{-- Review --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="true">
                                            Review
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-policy" type="button" role="tab" aria-controls="pills-policy" aria-selected="true">
                                            Product Policy
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                        {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis minus, ut unde laudantium accusamus odio nam officia aperiam excepturi quis nesciunt eveniet eligendi, corrupti voluptatibus. Similique doloremque velit optio aliquam. --}}
                                        {{-- product description id="pills-tabContent --}}
                                        {{-- {{$product->description}} --}}
                                        {{!!$product->description!!}}
                                    </div>

                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        @foreach ($product->review as $data)
                                            <div class="review-item-wrapper">
                                               {{-- reviewer photo/icon --}}
                                            <div class="review-item-left">
                                                {{-- <i class="fas fa-user"></i> --}}
                                                <img src="{{asset('backend/images/review/'.$data-image)}}" alt="reviewer image" height="100" width="100">
                                            </div>
                                            <div class="review-item-right">
                                                <h4 class="review-author-name">
                                                    {{-- Saidul Islam  --}}
                                                    {{$data->customer_name}}
                                                    <span class=" d-inline bg-danger badge-sm badge text-white">Verified</span>
                                                </h4>
                                                {{-- <p class="review-item-message">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis minus, ut unde laudantium accusamus odio nam officia aperiam excepturi quis nesciunt eveniet eligendi. --}}
                                                    {{!!$data->message!!}}
                                                </p>
                                                <span class="review-item-rating-stars">
                                                    {{-- <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i> --}}
                                                    @if ($data->rating == 5)
                                                        <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>

                                                    @elseif ($data->rating == 4)
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>

                                                    @elseif ($data->rating == 3)
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                    
                                                    @elseif ($data->rating == 2)
                                                    <i class="fa-star fas"></i>
                                                    <i class="fa-star fas"></i>
                                                   
                                                  
                                                    @elseif ($data->rating == 1)
                                                    <i class="fa-star fas"></i>
                                                   
                                                    
                                                        
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>

                                    <div class="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab">
                                        {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis minus,
                                        ut unde laudantium accusamus odio nam officia aperiam excepturi quis nesciunt eveniet eligendi --}}
                                        {{-- Product Policy id="pills-policy" --}}
                                        {{-- {{$product->policy}} --}}
                                        {{!!$product->policy!!}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category list product-details page --}}
                    <div class="col-lg-3 col-md-12">
                        <div class="product-details-sidebar">
                            <div class="product-details-categoris">
                                <h3 class="product-details-title">
                                    Category
                                </h3>
                                @foreach ($categories as $category)
                                    {{-- <a href="#" class="category-item-outer"> --}}
                                    <a href="{{url('/category-products')}}" class="category-item-outer">
                                    {{-- <img src="{{asset('/assets/images/product.png')}}" alt="category image"> --}}
                                    <img src="{{asset('/backend/images/category/'.$category->image)}}" alt="category image">
                                    {{-- Test Category --}}
                                    {{$category->name}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection