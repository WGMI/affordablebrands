@extends('master')
@section('content')

<a id="top"></a>

<div class="row">
    <!-- Product Category Filter -->
    <div class="col-md-3">
        <div class="category-filter-panel">
            <div class="filter-header">
                <h4><i class="fas fa-filter"></i> PRODUCT CATEGORY</h4>
            </div>
            <div class="filter-body">
                <ul class="category-list">
				<li>
                            <div class="form-check">

                                <label class="form-check-label" for="category1">Instant Tea</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                
                                <label class="form-check-label" for="category2">Herbal</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                
                                <label class="form-check-label" for="category3">Flavoured</label>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Slider Section -->
    <div class="col-md-9">
        <div id="slider-section" class="slider-section">
            <div id="carouselexamplegeneric" class="carousel slide slider-indexone" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="0"
                        class="active"></button>
                    <button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="2"></button>
                </div>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="images/slider/1.jpg" alt="1">
                        <div class="container">
                            <div class="slider-box">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/slider/2.jpg" alt="1">
                        <div class="container">
                            <div class="slider-box">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a title="Previous" class="carousel-control-prev" data-bs-target="#carouselexamplegeneric" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a title="Next" class="carousel-control-next" data-bs-target="#carouselexamplegeneric" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Category Section -->
<div id="category-section" class="category-section bottom-shadow">
    <!-- container -->
    <div class="container">
        <div class="category-box-main categories-slider">
            <!-- Owl Carousel -->
            <div class="our-partner">
                
            </div>
        </div>
    </div><!-- container /- -->
</div><!-- Category Section /- -->

<!-- Feature Product -->
<Section id="featured-products" class="featured-products bottom-shadow">
    <!-- container -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h3>Featured products</h3>
        </div><!-- Section Header /- -->

        <div class="category-box-main product-box-main row">
            @foreach ($first as $p)
                @include('includes.partials.singleproduct')
            @endforeach
        </div>
        <div class="category-box-main product-box-main row">
            @foreach ($second as $p)
                @include('includes.partials.singleproduct')
            @endforeach
        </div>
    </div><!-- container /- -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h3>Popular Products</h3>
        </div><!-- Section Header /- -->

        <div class="category-box-main product-box-main row">
            @foreach ($first as $p)
                @include('includes.partials.singleproduct')
            @endforeach
        </div>
        <div class="category-box-main product-box-main row">
            @foreach ($second as $p)
                @include('includes.partials.singleproduct')
            @endforeach
        </div>
    </div><!-- container /- -->
</section>
<!-- Feature Product /- -->

<!-- Feature Product -->

@endsection