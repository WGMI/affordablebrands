@extends('master')
@section('content')

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        @include('includes.partials.categories')
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <h4 class="fw-title">Search Results</h4><br>
                <div class="product-list">
                    <div class="row">
                        @forelse($products as $p)
                            <div class="col-lg-4 col-sm-6">
                                @include('includes.partials.singleproduct')
                            </div> 
                        @empty
                            <div class="col-lg-4 col-sm-6">
                                <h3>No results found for '{{request()->input('query')}}'</h3>
                                <br><br>
                                <!--<h5><a href="{{url('shop')}}" type="button">Browse Shop</a></h5>-->
                                <br><br><br><br><br>
                            </div> 
                        @endforelse
                    </div>
                    {{$products->appends(request()->input())->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
    
@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection