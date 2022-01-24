@extends('layouts.master')
@section('title')
    Show Products
@endsection
@section('content')
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">About Product: <strong> {{ $product->product_name }} </strong>
            <a href=" {{ route('products.index') }} " class=" btn btn-sm btn-success pull-right">Back</a>
        </h6>
        <div class="form-layout mg-t-25">
            <div class="row mg-b-25">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Name:</label>
                    <strong> {{ $product->product_name }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Code:</label>
                    <strong> {{ $product->product_code }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Quantity:</label>
                    <strong> {{ $product->product_quantity }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category:</label>
                    <strong> {{ $product->category->name }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Sub Category:</label>
                        <strong> {{ $product->subcategory->name }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brands:</label>
                        <strong> {{ $product->brand->name }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Size:</label>
                    <strong> {{ $product->product_size }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Color:</label>
                    <strong> {{ $product->product_color }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Selling Price:</label>
                    <strong> {{ $product->selling_price }} </strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Product Details:</label>
                    <span>{!! $product->product_details !!}</span>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Video Link:</label>
                    <strong>{{ $product->video_link }}</strong>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                @if ($product->main_slider == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Main Slider</span>
            </div>
            <div class="col-lg-4">
                @if ($product->hot_deal == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Hot Deal</span>
            </div>
            <div class="col-lg-4">
                @if ($product->best_rated == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Best Rated</span>
            </div>
            <div class="col-lg-4">
                @if ($product->mid_slider == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Mid Slider</span>
            </div>
            <div class="col-lg-4">
                @if ($product->hot_new == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Hot New</span>
            </div>
            <div class="col-lg-4">
                @if ($product->trend == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                <span>Trend</span>
            </div>
        </div><!-- row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Image One:</label>
                    <br>
                    <img src="{{asset($product->image_one)}}" alt="" width="80px" height="70px">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Image Two:</label>
                    <br>
                    <img src="{{URL::to($product->image_two)}}" alt="" width="80px" height="70px">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Image Three:</label>
                    <br>
                    <img src="{{URL::to($product->image_three)}}" alt="" width="80px" height="70px">
                </div>
            </div>
        </div>
    </div><!-- card -->

@endsection

