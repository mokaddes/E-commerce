@extends('layouts.master')
@section('title')
    Edit Coupons
@endsection
@section('content')
        <div class="row">
            <div class="col-md-10 container-fluid" style="margin-top:10px">
                <div class="pull-left btn btn-info">
                    Edit Coupon
                </div>
                <div class="pull-right">
                    <a href=" {{ route('coupons.index') }} " class="btn btn-info">Back</a>
                </div>

            </div>
        </div>
        <div class="col-md-10 container-fluid" style="margin-top:20px">
            <form action=" {{ route('coupons.update', $coupon->id) }} " method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="coupon_code" class="control-label">Coupon Code</label>
                    <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{$coupon->coupon_code}}">
                </div>
                <div class="form-group">
                    <label for="discount" class="control-label">Coupon Discount</label>
                    <input type="text" name="discount" id="discount" class="form-control" value="{{$coupon->discount}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-contol">Submit</button>
                </div>
            </form>
        </div>
@endsection
