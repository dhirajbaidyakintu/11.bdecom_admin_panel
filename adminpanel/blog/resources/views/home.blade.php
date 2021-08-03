@extends('masterLayout.app')
@section('title', 'Home')
@section('content')
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalVisitorKey}}</h3>
                        <h3 class="count-card-text text-center">Total Visitor</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalProductListKey}}</h3>
                        <h3 class="count-card-text text-center">Total Product</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalProductOrderKey}}</h3>
                        <h3 class="count-card-text text-center">Total Product Order</h3>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalCategoryKey}}</h3>
                        <h3 class="count-card-text text-center">Total Category</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalSubCategoryKey}}</h3>
                        <h3 class="count-card-text text-center">Total SubCategory</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalContactKey}}</h3>
                        <h3 class="count-card-text text-center">Total Contact</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalReviewKey}}</h3>
                        <h3 class="count-card-text text-center">Total Review</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalSiteInfoKey}}</h3>
                        <h3 class="count-card-text text-center">Total Site Info</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalImageGalleryKey}}</h3>
                        <h3 class="count-card-text text-center">Total Image (Gallery)</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalSliderKey}}</h3>
                        <h3 class="count-card-text text-center">Total Slider</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalProductCartKey}}</h3>
                        <h3 class="count-card-text text-center">Total Product Cart</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 home-table11">
                <div class="card home-table11 text-white">
                    <div class="card-body">
                        <h3 class="count-card-title text-center">{{$totalFavListKey}}</h3>
                        <h3 class="count-card-text text-center">Total Favourite List</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
