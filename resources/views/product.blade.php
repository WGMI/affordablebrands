@extends('master')
@section('title')
{{$product->name}} | 
@endsection
@section('content')

<!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
            <div class="col-md-3">
            <div class="category-filter-panel">
                <div class="filter-header">
                    <h4><i class="fas fa-filter"></i> PRODUCT CATEGORY</h4>
                </div>
                <div class="filter-body">
                    <ul class="category-list">
                        <li>
                            <div class="form-check">

                                <label class="form-check-label" for="category1">Instant Tea</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                
                                <label class="form-check-label" for="category2">Herbal</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                
                                <label class="form-check-label" for="category3">Flavoured</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                <div class="col-lg-9">
                    <div class="row" style="margin-top: 20px;">
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
                                    <div style="display: flex; flex-direction: row; align-items: center;">
                                        <h3>{{$product->name}}</h3>
                                        <span id="instock" style="background-color: green; border-radius: 15px; color: white; margin-left: 20px; padding: 5px 10px;">In Stock</span>
                                    </div>
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
                                    <h5>{{$product->presentPrice()}}</h5>
                                    <p>{!!$product->description!!}</p>
                                    @auth
                                    @if(auth()->user()->role_id == 3)
                                    <h4>{{$product->presentWholesalePrice()}}</h4>
                                    @else
                                    @endif
                                    @endauth
                                </div>
                                
                                <div class="quantity" id="qty-cart-div" style="display: flex; flex-direction: row; align-items: center;">
                                    @if($product->quantity > 0)
                                    <form action="{{url('/cartsingle')}}" method="POST" id="prd{{$product->id}}"> 
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        @auth
                                        @if(auth()->user()->role_id == 3)
                                        <input type="hidden" name="price" value="{{$product->list_price_per_case}}">
                                        @else
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        @endif
                                        @endauth
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
                                                @auth
                                                @if(auth()->user()->role_id == 3)
                                                <div class="p-price">{{$product->presentWholesalePrice()}}</div>
                                                @else
                                                <div class="p-price">{{$product->presentPrice()}}</div>
                                                @endif
                                                @endauth
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
            <div class="category-box-main product-box-main row">
                @foreach($relatedproducts as $p)
                        @include('includes.partials.singleproduct')
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Related Products Section End -->


@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection