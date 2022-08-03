@extends('master')
@section('content')

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        @include('includes.historytable')
                    </div>
                    <div class="row">
                        <div class="col-lg-4">                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection