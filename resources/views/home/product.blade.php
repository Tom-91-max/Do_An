@extends('master.main')
@section('title', $product->name)
@section('main')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{ $product->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <section class="shop-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shop-details-images-wrap">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                                <a href="uploads/product/{{$product->image}}" class="popup-image">
                                    <img id="big-img" src="uploads/product/{{$product->image}}" alt="{{$product->name}}" width="100%">
                                </a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">   
                            <li class="nav-item" role="presentation">
                                <button class="nav-link">
                                    <img class="thumb-image" src="uploads/product/{{$product->image}}" alt="" width="125px">
                                </button>
                            </li>
                            @foreach($product->images as $img)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link">
                                    <img class="thumb-image" src="uploads/product/{{$img->image}}" alt="" width="125px">
                                </button>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-details-content">
                        <h2 class="title">{{ $product->name }}</h2>
                        
                        </div>
                        <h3 class="price">${{ number_format($product->price) }} <span>- {{ $product->status == 1 ? 'In stock' : 'Out stock' }}</span></h3>
                        
                        <div class="shop-details-qty">
                            <span class="title">Quantity :</span>
                            <div class="shop-details-qty-inner">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                                <a href="{{ route('cart.add', $product->id) }}" class="purchase-btn">ADD TO CART</a>
                            </div>
                        </div>
                        
                        <div class="shop-add-Wishlist">
                            <a href="#"><i class="far fa-heart"></i>Add to Wishlist</a>
                        </div>
                        <div class="sd-category">
                            <span class="title">CATEGORY:</span>
                            <ul class="list-wrap">
                                <li><a href="#">{{$product->cat->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-10 justify-content-center">
                    <div class="product-desc-wrap justify-content-center">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Description</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content justify-content-center" id="descriptionTabContent">
                            <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                                <div class="product-description-content ">
                                    {!! $product->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- product-area -->
    <section class="related-product-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <span class="sub-title">Organic Shop</span>
                        <h2 class="title">Related Products</h2>
                        <div class="title-shape" data-background="uploads/images/title_shape.png"></div>
                    </div>
                </div>
            </div>
            <div class="product-item-wrap-three">
                <div class="row justify-content-center rp-active">
                    @foreach($related_prd as $prd)
                    <div class="col-xl-3">
                        <div class="product-item-three inner-product-item">
                            <div class="product-thumb-three">
                                <a href="{{route('home.product', $prd->id)}}"><img src="uploads/product/{{ $prd -> image}}" alt=""></a>
                            </div>
                            <div class="product-content-three">
                                <h2 class="title"><a href="{{route('home.product', $prd->id)}}">{{ $prd->name}}</a></h2>
                                <h2 class="price">{{ $prd->price}}</h2>
                            </div>
                            <div class="product-shape-two">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                    <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- product-area-end -->

</main>

@stop()

@section('js')
<script>
    $('.thumb-image').click(function(e) {
        e.preventDefault();

        var _url = $(this).attr('src');

        $('#big-img').attr('src', _url)
    })

</script>

@stop()
