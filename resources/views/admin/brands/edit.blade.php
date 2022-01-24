@extends('layouts.master')
@section('title')
    Edit Categories
@endsection
@section('content')
        <div class="row">
            <div class="col-md-10 container-fluid" style="margin-top:10px">
                <div class="pull-left btn btn-info">
                    Edit Category
                </div>
                <div class="pull-right">
                    <a href=" {{ route('brands.index') }} " class="btn btn-info">Back</a>
                </div>

            </div>
        </div>
        <div class="col-md-10 container-fluid" style="margin-top:20px">
            <form action=" {{ route('brands.update', $brand->id) }} " method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="control-label">Brand Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$brand->name}}">
                </div>
                <div class="form-group">
                    <label for="barnd_logo" class="control-label">Brand Logo</label>
                    <input type="file" name="barnd_logo" id="barnd_logo" class="form-control" value="{{URL::to($brand->barnd_logo)}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-contol">Submit</button>
                </div>
            </form>
        </div>
@endsection
