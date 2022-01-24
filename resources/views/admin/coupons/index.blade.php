@extends('layouts.master')
@section('title')
    Coupons
@endsection

@section('content')

    <div class="sl-pagebody">
      <div class="sl-page-title">
                <h5>Coupon Table</h5>

      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40" style="margin-top: 20px">
        <h6 class="card-body-title">Coupon List
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
                <th class="text-center">Couopn Code</th>
                <th class="text-center">Coupon Discount</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr>
                    <td> {{ ++$i }} </td>
                    <td>{{ $coupon->coupon_code }}</td>
                    <td> {{ $coupon->discount }}%</td>
                    <td>
                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" id="form">


                            <a class="btn btn-primary" href="{{ route('coupons.edit', $coupon->id) }}">Edit</a>

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
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action=" {{ route('coupons.store') }} " method="post" enctype='multipart/form-data'>
                <div class="modal-body pd-20">

                    @csrf
                    <div class="form-group">
                        <label for="coupon_code" class="control-label">Coupon Code</label>
                        <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Coupon Code">
                    </div>
                    <div class="form-group">
                        <label for="discount" class="control-label">Coupon Discount</label>
                        <input type="text" name="discount" id="discount" class="form-control">
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
