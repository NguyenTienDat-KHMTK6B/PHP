@extends('trangchu')
@section('home')
    <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">
                                                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="assets/images/product/electric/product-01.png" alt="Product Images">
                                                <img class="hover-img" src="{{ $product->images }}" alt="Product Images">
                                            </a>
                                            <div class="label-block label-right">
                                                <div class="product-badget">20% Off</div>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                    <li class="select-option">
                                                        <a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">
                                                            Add to Cart
                                                        </a>
                                                    </li>
                                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <div class="product-rating">
                                                    <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                                    <span class="rating-number">(64)</span>
                                                </div>
                                                <h5 class="title"><a href="{{ route('user.productdetails', ['id' => $product->product_id]) }}">{{ $product->title }}</a></h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price">${{ $product->price }}</span>
                                                    <span class="price old-price">{{ $product->discount * 100 }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Product  -->

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                    </div>
                </div>

            </div>
        </div>
    <!-- End Expolre Product Area  -->
@endsection