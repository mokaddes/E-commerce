<div class="dropdown active open">
    <div class="dropdown-toggle" data-toggle="dropdown" >
        <div class="cart">
            @php $total = 0 @endphp
            @foreach((array) session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                <div class="cart_icon">
                    <img src="{{asset('forntend/images/cart.png')}}" alt="">
                    <div class="cart_count"><span>{{ count((array) session('cart')) }}</span></div>
                </div>
                <div class="cart_content">
                    <div class="cart_text"><a href="#">Cart</a></div>
                    <div class="cart_price">$ {{ $total }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdown-menu" style="width: 200%">
        <div class="row total-header-section">
            <div class="col-lg-4 col-sm-4 col-4">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </div>
            @php $total = 0 @endphp
            @foreach((array) session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
            <div class="col-lg-8 col-sm-8 col-8 total-section text-right">
                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
            </div>
        </div>
        @if(session('cart'))
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
                        <a class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
            </div>
        </div>
    </div>
</div>
