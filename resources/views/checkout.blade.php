@extends('master')
@section('content')

    <div class="container">
		<div class="page-header bottom-shadow">
			<h3>Checkout</h3>
		</div><!-- Section Header /- -->
	</div><!-- container /- -->
	<!-- Page Breadcrumb /- -->

	<div class="page-wizard">
		<!-- container -->
		<div class="container">
			<!-- contact-form-details -->
			<div class="contact-form-details shipping-transports row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="section-header">
						<h3>Details</h3>
					</div><!-- Section Header /- -->
					<div class="contact-form bottom-shadow">
                        <form class="form-horizontal" action="{{url('checkout')}}" method="POST" class="checkout-form" id="checkout">
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
                                            <label for="fir">Name<span>*</span></label><br>
                                            <input type="text" id="fir" name="name" value="{{old('name')}}"
                                            value="{{old('name')}}">
                                            <p style="color: red">@error('name') {{$message}} @enderror</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="email">Email Address<span>*</span></label><br>
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
                                            <label for="cun">County<span>*</span></label><br>
                                            <input type="text" id="cun" name="county" value="{{old('county')}}">
                                            <p style="color: red">@error('county') {{$message}} @enderror</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="cun">City/Town<span>*</span></label><br>
                                            <input type="text" id="city" name="city" value="{{old('city')}}">
                                            <p style="color: red">@error('city') {{$message}} @enderror</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="street">Street Address<span>*</span></label><br>
                                            <input type="text" id="street" class="street-first" placeholder="e.g. Estate/Apartment Name, House No." name="street" value="{{old('street')}}">
                                            <p style="color: red">@error('street') {{$message}} @enderror</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="phone">Phone<span>*</span></label><br>
                                            <input type="text" id="phone" name="phone" value="{{old('phone')}}">
                                            <p style="color: red">@error('phone') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="place-order">
                                        <h4>Your Order</h4>
                                        <div class="order-total">
                                            <ol>
                                                @foreach(Cart::content() as $item)
                                                    <li class="fw-normal">{{$item->model->name}} x {{$item->qty}} <span> = {{$item->price * $item->qty}}</span></li>
                                                @endforeach
                                            </ol>
                                            <p class="total-price">Total <span>{{presentPrice(Cart::total())}}</span></p>
                                            <div class="payment-check">
                                                <label for="payment">Payment Method</label><br>
                                                <select name="payment" class="form-select">
                                                    <option value="mrn" selected="">Pay with MPesa</option>
                                                    <option value="mod" >MPesa on delivery</option>
                                                    <option value="cod">Cash on delivery</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="order-btn">
                                                <button onclick="event.preventDefault(); submitForm();" class="btn" id="checkoutButton">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div><!-- Contact Form Details /- -->
			<div class="wizard-footer">
				<a title="Back" href="07_login_register.html"
					class="btn btn-next btn-fill btn-warning btn-wd btn-sm ">Back</a>
				<a title="Continue" href="09_payment.html"
					class="btn btn-next btn-fill btn-warning btn-wd btn-sm">Continue</a>
			</div>
		</div>
	</div>

@endsection
@section('extra-js')
<script type="text/javascript">
    function submitForm(){
        document.getElementById('checkoutButton').disabled = true;
        document.getElementById('checkout').submit();
    }
</script>
@endsection