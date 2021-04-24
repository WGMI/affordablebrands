@extends('master')
@section('content')

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <h2>Thank You</h2>
                <br><br>
                <h4>Your order is being processed</h4>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
    
@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection