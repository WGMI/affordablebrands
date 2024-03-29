@extends('master')
@section('content')

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="{{url('checkout')}}" method="POST" class="checkout-form" id="checkout">
            @csrf
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
            <div class="row">
                <div class="col-lg-6">
                    <h4>Billing</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" id="fir" name="name" value="{{old('name')}}"
                            value="{{old('name')}}">
                            <p style="color: red">@error('name') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email" name="email" 
                            @if(auth()->user())
                            value="{{auth()->user()->email}}" readonly
                            @else
                            value="{{old('email')}}"
                            @endif
                            >
                            <p style="color: red">@error('email') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">County<span>*</span></label>
                            <input type="text" id="cun" name="county" value="{{old('county')}}">
                            <p style="color: red">@error('county') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">City/Town<span>*</span></label>
                            <input type="text" id="city" name="city" value="{{old('city')}}">
                            <p style="color: red">@error('city') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span>*</span></label>
                            <input type="text" id="street" class="street-first" placeholder="e.g. Estate/Apartment Name, House No." name="street" value="{{old('street')}}">
                            <p style="color: red">@error('street') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>*Begin with 254</span></label>
                            <input type="text" id="phone" name="phone" value="{{old('phone')}}">
                            <p style="color: red">@error('phone') {{$message}} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                @foreach(Cart::content() as $item)
                                	<li class="fw-normal">{{$item->model->name}} x {{$item->qty}} <span>{{$item->price}}</span></li>
                                @endforeach
                                <li class="total-price">Total <span>{{presentPrice(Cart::total())}}</span></li>
                            </ul>
                            <div class="payment-check">
                                <label for="payment">Payment Method</label>
                                <select name="payment" class="form-select">
                                    <option value="mrn" selected="">Pay with MPesa</option>
                                    <option value="mod" >MPesa on delivery</option>
                                    <option value="cod">Cash on delivery</option>
                                </select>
                            </div>
                            <div class="order-btn">
                                <button onclick="event.preventDefault(); submitForm();" class="site-btn place-btn" id="checkoutButton">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection
@section('extra-js')
<script type="text/javascript">
    function submitForm(){
        document.getElementById('checkoutButton').disabled = true;
        document.getElementById('checkout').submit();
    }
</script>
@endsection