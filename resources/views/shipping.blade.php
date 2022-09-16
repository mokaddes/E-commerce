@extends('layouts.front')
@section('title')
    Shipping Address
@endsection
@section('content')
    <div class="container mt-5 text-dark">
        <h3 class="mb-3">Shipping address</h3>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ count((array) session('cart')) }}</span>
                </h4>
                {{-- <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul> --}}
                <div class="row total-header-section">
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                </div>
                @if(session('cart'))
                    <div class="card px-2 mb-3">
                        <div class="card-body">
                            @foreach(session('cart') as $id => $details)
                        <div class="row cart-detail mr-2">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ asset($details['image']) }}" width="60px" />
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 cart-detail-product">
                                <p>{{ $details['name'] }}
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </p>
                            </div>
                            <div class="col-2 text-left" style="padding-right:2px">
                                <a href="#" class="badge badge-danger">Delete</a>
                            </div>
                        </div>
                    @endforeach
                        </div>
                    <div class="card-header mb-2">
                        <div class="row mr-2">
                            <div class="col-lg-6 col-sm-4 col-4 cart-detail-img">
                                <strong>Total Price</strong>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 cart-detail-product text-right">
                                <span class="text-info">$ {{ $total }}</span>
                            </div>
                        </div>
                    </div>

                </div>
                @endif

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">

                <form class="needs-validation" novalidate action="">
                    <div class="mb-3">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') invalid-feedback @enderror"
                            id="name" value="{{ auth()->user()->name }}" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email ?? '' }}">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country" class="control-label">Country</label>
                            <select class="custom-select d-block w-100 ml-0" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100 ml-0" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
