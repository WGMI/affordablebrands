<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product">
    <div class="category-box product-box">
        <div class="inner-product">
            <a href="{{route('shop.show',$p->slug)}}">
                <img src="{{productImage($p->image)}}" alt="featured-img" style="max-height: 292px; max-width: 292px; object-fit:contain;"/>
            </a>
            <input type="hidden" value="{{route('cart.post')}}" id="postroute"/>
            <span id="addedmsg{{$p->id}}" class="badge badge-success added"></span>
            <div class="product-box-inner">
                @if($p->quantity > 0)
                    @if(Request::is('shop'))
                        <a class="btn" href="#" onclick="event.preventDefault(); ajaxCall({{$p->id}});">+ Add To Cart</a>
                    @else
                        <a class="btn" href="{{route('shop.show',$p->slug)}}">+ View Item</a>
                    @endif
                @else
                    <a class="link" href="{{route('shop.show',$p->slug)}}">- Out of stock</a>
                @endif
                <form action="{{url('/cart')}}" method="POST" id="prd{{$p->id}}"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <input type="hidden" name="name" value="{{$p->name}}">
                    @auth
                    @if(auth()->user()->role_id == 3)
                    <input type="hidden" name="price" value="{{$p->list_price_per_case}}">
                    @else
                    <input type="hidden" name="price" value="{{$p->price}}">
                    @endif
                    @endauth
                    <input type="hidden" value="1" name="qty">
                    <input type="hidden" name="productqty" value="{{$p->quantity}}">
                </form>
            </div>
        </div>
    </div>
    <a title="{{$p->name}}" href="{{route('shop.show',$p->slug)}}" class="product-title">{{$p->name}}</a>
    <span class="amount">{{presentPrice($p->price)}}</span>
</div>