@extends('layouts.master')
@section('title')
    Sub Categories
@endsection

@section('content')

    <div class="sl-pagebody">
      <div class="sl-page-title">
                <h5>Sub Category Table</h5>

      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40" style="margin-top: 20px">
        <h6 class="card-body-title">Sub Categories List
            <a href="#" class=" btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modaldemo3">Add New</a>
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
          <table id="datatable1" class="table display responsive nowrap text-center">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Category Name</th>
                <th class="text-center">Sub Category Name</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcat)
                <tr>
                    <td> {{ ++$i }} </td>
                    <td>{{ $subcat->category->name }}</td>
                    <td>{{ $subcat->name }}</td>
                    <td>
                        <form action="{{ route('subcategories.destroy', $subcat->id) }}" method="POST" id="form">


                            <a class="btn btn-primary" href="{{ route('subcategories.edit', $subcat->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" id="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->

      </div><!-- card -->
    </div><!-- sl-pagebody -->

    {{-- Add Modal --}}
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action=" {{ route('subcategories.store') }} " method="post">
                <div class="modal-body pd-20">

                    @csrf
                    <div class="form-group">
                        <label for="category_id" class="control-label">Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cat)
                             <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Sub Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Add Sub Category">
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Save Data</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->

@endsection
