@extends('layouts.master')
@section('title')
    Products
@endsection

@section('content')

    <div class="sl-pagebody">
      <div class="sl-page-title">
                <h5>Product Table</h5>

      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40" style="margin-top: 20px">
        <h6 class="card-body-title">Products List
            <a href=" {{ route('products.create') }} " class=" btn btn-sm btn-success pull-right">Add New</a>
        </h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-wrapper">
          <table id="datatable1" class="table responsive text-center">
            <thead>
              <tr>
                <th class="text-center">Code</th>
                <th class="text-center">Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Category</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>
                        <img src="{{URL::to($product->image_one)}}" alt="" width="50px" height="50px">
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>
                        @if ($product->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="form">

                            <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></button>
                            @if ($product->status == 1)
                                <a class="btn btn-primary" href="{{ URL::to('inactive/product/'. $product->id) }}"><i class="fa fa-thumbs-up"></i></a>
                            @else
                                <a class="btn btn-primary" href="{{ route('products.active', $product->id) }}"><i class="fa fa-thumbs-down"></i></a>
                        @endif
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->

      </div><!-- card -->
    </div><!-- sl-pagebody -->

    @endsection
