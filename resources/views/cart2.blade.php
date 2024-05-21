@extends('master')
@section('content')

<!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <input type="hidden" value="{{url('cart')}}" id="cartcontent"/>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    
                    @if(Cart::count() > 0)
                        <div class="cart-table">
                            @include('includes.carttable')
                        </div>
                        <div class="row">
                            <div class="col-lg-4">                               
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="cart-total">Total <span>{{presentPrice(Cart::total())}}</span></li>
                                    </ul>
                                    <a href="{{url('/checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <h2>No items in cart</h2>
                        <br><br>
                        <a href="{{url('/shop')}}" class="primary-btn">Back to Shop</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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