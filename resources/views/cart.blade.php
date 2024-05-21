@extends('master')
@section('content')

<!-- Page Breadcrumb -->
	<!-- container -->
	<div class="container">
		<div class="page-header bottom-shadow">
			<h3>Shopping Cart</h3>
		</div><!-- Section Header /- -->
	</div><!-- container /- -->
	<!-- Page Breadcrumb /- -->

	<div class="page-wizard shopping-cart shopping-product-table">
		<!-- container -->
		<div class="container">
            <input type="hidden" value="{{url('cart')}}" id="cartcontent"/>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
			<!-- Shopping-cart-table -->
			<div class="shopping-cart-table bottom-shadow">
                @if(Cart::count() > 0)
                    <table class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-description">Item</th>
                                <th class="blank-space"></th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">subtotal</th>
                                <th class="product-change"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $item)
                            <tr>
                                <td data-title="Product" class="product-tdumbnail">
                                    <img src="{{asset('storage/'.$item->model->image)}}" style="max-height: 58px; max-width: 58px; object-fit:contain;" alt="summary" />
                                </td>
                                <td data-title="Description" class="product-description">
                                    {{$item->model->name}}
                                </td>
                                <td data-title="" class="blank-space"></td>
                                <td data-title="Price" class="product-price">
                                    <span class="price-amount">{{$item->price}}</span>
                                </td>
                                <td data-title="Quantity" class="product-quantity">
                                    <form action="{{url('/cartupdate')}}/{{$item->rowId}}" method="POST">
                                        @csrf
                                        <select name="quantity" onchange="this.form.submit()">
                                            @for($x=1;$x<6;$x++)
                                                <option value="{{$x}}" {{$item->qty==$x ? 'selected':''}}>{{$x}}</option>
                                            @endfor
                                        </select>
                                    </form>
                                </td>
                                <td data-title="subtotal" class="product-subtotal">
                                    <span class="amount">{{$item->qty * $item->price}}</span>
                                </td>
                                <td data-title="edit/delete" class="product-edit">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" id="remove-{{ $item->rowId }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a title="Trash Icon" onclick="event.preventDefault(); document.getElementById('remove-{{ $item->rowId }}').submit();">
                                        <span class="product-delete"><i class="fa fa-trash-o"></i></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="shopping-cart-footer">
                        <a title="Continue Shopping" href="{{url('shop')}}" class="btn btn-default">Continue Shopping</a>
                    </div>
                @else
                    <div class="page-header bottom-shadow">
                        <h3>No items in cart</h3>
                    </div>
                    <br><br>
                    <a href="{{url('shop')}}" type="submit" class="btn btn-default">Back to Shop</a>
                @endif
			</div>
		</div>
	</div>
	<!-- Cart estimate -->
    @if(Cart::count() > 0)
        <div class="shopping-cart-estimate">
            <!-- container -->
            <div class="container">
                <div class="row">
                    <!-- col-md-4 -->
                    <div class="col-12 col-md-12 col-lg-4">
                    </div><!-- col-md-4 /- -->
                    <!-- col-md-4 -->
                    <div class="col-12 col-md-12 col-lg-4">
                    </div><!-- col-md-4 /- -->
                    <!-- col-md-4 -->
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="estimate-details shopping-cart-table">
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">{{presentPrice(Cart::total())}}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Grand Total</th>
                                        <td><strong><span class="total-amount">{{presentPrice(Cart::total())}}</span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{url('checkout')}}" type="submit" class="btn btn-default">proceed to checkout</a>
                        </div>
                    </div><!-- col-md-4 /- -->
                </div>
            </div>
        </div><!-- Cart estimate -->
    @endif

@endsection

@section('extra-js')
<script>
    function changeQuantity(id,direction,currentQty){
        var newQty;
            var countSpan = document.getElementsByClassName('countbadge');
            var url = document.getElementById('patchroute').value;

            if(direction){
                newQty = 1 + currentQty;
                countSpan[0].innerHTML = parseInt(countSpan[0].innerHTML) + 1;
            } else{
                newQty = currentQty - 1;
                countSpan[0].innerHTML = parseInt(countSpan[0].innerHTML) - 1;
            }

            if(newQty == 0){
                document.getElementById('remove-'+id).submit();
            } else{
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {quantity:newQty},
                    success: function(){
                      console.log('Success');
                    },
                    error: function(xhr, status, error){
                      var errorMessage = xhr.status + ': ' + xhr.statusText
                      console.log('Error - ' + errorMessage);
                    }
                });
                //refreshTable();
            }
    }

    function refreshTable(){
        var cartcontenturl = document.getElementById('cartcontent');
        $('div.cart-table').load('/cartcontent');//.on('load',cartcontenturl);
    }
</script>
@endsection