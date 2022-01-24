@extends('layouts.master')
@section('title')
    Categories
@endsection
@section('content')
        <div class="row">
            <div class="col-md-10 container-fluid" style="margin-top:10px">
                <div class="pull-left btn btn-info">
                    Add Category
                </div>
                <div class="pull-right">
                    <a href=" {{ route('categories.index') }} " class="btn btn-info">Back</a>
                </div>

            </div>
        </div>
        <div class="col-md-10 container-fluid" style="margin-top:20px">
            <form action=" {{ route('categories.store') }} " method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-contol">Submit</button>
                </div>
            </form>
        </div>
@endsection
