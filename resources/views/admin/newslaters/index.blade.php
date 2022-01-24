@extends('layouts.master')
@section('title')
    Subscribers
@endsection

@section('content')
    {{-- <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Tables</a>
      <span class="breadcrumb-item active">Data Table</span>
    </nav> --}}

    <div class="sl-pagebody">
      <div class="sl-page-title">
                <h5>Subscriber Table</h5>

      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40" style="margin-top: 20px">
        <h6 class="card-body-title">Subscribers List
            <a href=" {{ route('dashboard') }} " class=" btn btn-sm btn-success pull-right">Dashboard</a>
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
                <th class="text-center">Subscriber Email</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($newslaters as $subscriber)
                <tr>
                    <td> {{++$i}} </td>
                    <td>{{$subscriber->email}}</td>
                    <td>{{$subscriber->created_at}}</td>
                    <td>
                        <form action="{{ route('newslaters.destroy', $subscriber->id) }}" method="POST" id="form">

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


@endsection
