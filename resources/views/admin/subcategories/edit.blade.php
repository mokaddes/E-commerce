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
                    <a href=" {{ route('subcategories.index') }} " class="btn btn-info">Back</a>
                </div>

            </div>
        </div>
        <div class="col-md-10 container-fluid" style="margin-top:20px">
            <form action=" {{ route('subcategories.update', $subcategory->id) }} " method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_id" class="control-label">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="{{ $subcategory->category->id }}">{{ $subcategory->category->name }}</option>
                        @foreach ($categories as $cat)
                         <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Sub Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$subcategory->name}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-contol">Submit</button>
                </div>
            </form>
        </div>
@endsection
