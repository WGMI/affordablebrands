@extends('master')
@section('extra-css')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
	var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
</script>
@endsection
@section('content')

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="{{url('checkout')}}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h4>Biiling</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" id="fir" name="name" value="{{old('name')}}"
                            value="{{old('name')}}">
                            <p style="color: red">@error('name') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email" name="email" value="{{old('email')}}">
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
                        <div class="col-lg-12"> 
                            <label for="zip">Postcode / ZIP (optional)</label>
                            <input type="text" id="zip" name="zip" value="{{old('zip')}}">
                            <p style="color: red">@error('zip') {{$message}} @enderror</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>*</span></label>
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
                                	<li class="fw-normal">{{$item->model->name}} x {{$item->qty}} <span>{{$item->model->presentPrice()}}</span></li>
                                @endforeach
                                <li class="total-price">Total <span>{{presentPrice(Cart::total())}}</span></li>
                            </ul>
                            <div class="payment-check">
                                <label for="payment">Payment Method</label>
                                <select name="payment" class="form-select">
                                    <option value="mod" selected="">MPesa on delivery</option>
                                    <option value="cod">Cash on delivery</option>
                                </select>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
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
