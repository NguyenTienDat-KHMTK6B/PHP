@extends('shop')
@section('content')
    <div class="col-lg-9">
        <!-- End .row -->
        <div class="row row--15">
            @foreach ($products as $product)
                <div class="col-xl-4 col-sm-6">
                    <div class="axil-product product-style-one mb--30">
                        <div class="thumbnail">
                            <a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">
                                <img src="{{ $product->images }}" alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">10% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">{{ $product->title }}</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">{{ $product->price }}</span>
                                    <span class="price old-price">{{ $product->discount * 100 }}% </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center pt--20">
            <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
        </div>
    </div>
@endsection

@section('category')
    @include('user.categories')
@endsection