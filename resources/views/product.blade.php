@extends('master')
@section('title')
{{$product->name}} | 
@endsection
@section('content')

<!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            @include('includes.partials.categories')
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic">
                                <img class="product-big-img" src="{{asset('storage/'.$product->image)}}" alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @if($images)
                                        @foreach($images as $image)
                                            <div class="pt active" data-imgbigurl="{{asset('storage/'.$image)}}"><img
                                                    src="{{asset('storage/'.$image)}}" alt=""></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    @if($product->categories()->first())
                                        <span>{{$product->categories()->first()->name}}</span>
                                    @endif
                                    <h3>{{$product->name}}</h3>
                                </div>
                                <!--<div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>-->
                                <div class="pd-desc">
                                    <p>{!!$product->description!!}</p>
                                    <p style="color: {{$stock[1]}}">{{$stock[0]}}</p>
                                    <h4>{{$product->presentPrice()}}</h4>
                                </div>
                                <!--
                                <div class="pd-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor
                                        sit amet, consectetur adipisicing elit, sed do mod tempor</p>
                                    <h4>$495.00 <span>629.99</span></h4>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        <div class="cc-item">
                                            <input type="radio" id="cc-black">
                                            <label for="cc-black"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-yellow">
                                            <label for="cc-yellow" class="cc-yellow"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-violet">
                                            <label for="cc-violet" class="cc-violet"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" id="sm-size">
                                        <label for="sm-size">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="md-size">
                                        <label for="md-size">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="lg-size">
                                        <label for="lg-size">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="xl-size">
                                        <label for="xl-size">xs</label>
                                    </div>
                                </div>-->
                                <div class="quantity">
                                    @if($product->quantity > 0)
                                    <form action="{{url('/cartsingle')}}" method="POST" id="prd{{$product->id}}"> 
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <input type="hidden" name="productqty" value="{{$product->quantity}}">
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="qty" id="qty">
                                        </div>
                                    </form>
                                    <a href="#" class="primary-btn pd-cart" onclick="event.preventDefault(); ajaxProdCall({{$product->id}})">Add To Cart</a>
                                    @endif
                                </div>
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{session()->get('error')}}
                                    </div>
                                @endif

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <!--<ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                    <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <p>{!!$product->description!!}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">{{$product->presentPrice()}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                <div class="p-stock">{{$stock[0]}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Brand</td>
                                            <td>
                                                <div class="p-size">{{$product->brand}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td><span class="cs-color" style="background: {{$product->color}}"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">{{$product->sku}}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->


<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>You May Also Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedproducts as $p)
                <div class="col-lg-4 col-sm-6">
                    @include('includes.partials.singleproduct')
                </div> 
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->


@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection