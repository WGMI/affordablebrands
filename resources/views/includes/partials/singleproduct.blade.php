<div class="product-item">
    <div class="pi-pic">
        <a href="{{route('shop.show',$p->slug)}}"><img class="prod_img" src="{{productImage($p->image)}}" alt=""></a>
        <input type="hidden" value="{{route('cart.post')}}" id="postroute"/>
        <!--<div class="sale" id="addedmsg{{$p->id}}" style="display: none"></div>-->
        <span id="addedmsg{{$p->id}}" class="badge badge-success added"></span>
        <ul>
            <li class="quick-view">
                @if($p->quantity > 0)
                    @if(Request::is('shop'))
                        <a class="link" href="#" onclick="event.preventDefault(); ajaxCall({{$p->id}});">
                            + Add To Cart
                        </a>
                    @else
                        <a class="link" href="{{route('shop.show',$p->slug)}}">
                            + View Item
                        </a>
                    @endif
                @else
                <a class="link" href="{{route('shop.show',$p->slug)}}">
                    - Out of stock
                </a>
                @endif

                <form action="{{url('/cart')}}" method="POST" id="prd{{$p->id}}"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <input type="hidden" name="name" value="{{$p->name}}">
                    <input type="hidden" name="price" value="{{$p->price}}">
                    <input type="hidden" value="1" name="qty">
                    <input type="hidden" name="productqty" value="{{$p->quantity}}">
                </form>
            </li>
            <!--<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>-->
        </ul>
    </div>
    <div class="pi-text">
        <!-- <div class="catagory-name">Electronics</div> -->
        @auth
            <a href="{{route('shop.show',$p->slug)}}">
                <h5>{{$p->name}}</h5>
                @if(auth()->user()->role_id == 3)
                <p>Batch of {{$p->units_per_case}}</p>
                @endif
            </a>
        @endauth
        @auth
            <div class="product-price">
                {{auth()->user()->role_id == 2 ? presentPrice($p->price) : presentPrice($p->list_price_per_case)}}
            </div>
        @else
            <div class="product-price">
                {{presentPrice($p->price)}}
            </div>
        @endauth
    </div>
</div>