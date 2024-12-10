<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product mb-4">
    <div class="card h-100" style="border: none">
        <div class="product-image-container">
            <img src="{{productImage($p->image)}}" class="card-img-top product-image" alt="{{$p->name}}"/>
        </div>
        <input type="hidden" value="{{route('cart.post')}}" id="postroute"/>
        <span id="addedmsg{{$p->id}}" class="badge badge-success added"></span>
        <div class="card-body text-center d-flex flex-column justify-content-between">
            <h5 class="card-title">{{$p->name}}</h5>
            <p class="card-text">{{presentPrice($p->price)}}</p>
            @if($p->quantity > 0)
                @if(Request::is('shop'))
                    <a href="#" onclick="event.preventDefault(); ajaxCall({{$p->id}});" class="btn btn-primary" style="background-color: #ffea00; border: none; color: black;">Add to Cart</a>
                @else
                    <a href="{{route('shop.show',$p->slug)}}" class="btn btn-primary" style="background-color: #ffea00; border: none; color: black;">View</a>
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
