@extends('layouts.master')
@section('title')
    Edit Products
@endsection
@section('content')
    <form action=" {{route('products.store')}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Product
                <a href=" {{ route('products.index') }} " class=" btn btn-sm btn-success pull-right">Back</a>
            </h6>

            <div class="form-layout mg-t-25">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" value=" {{ $product->product_name }} ">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code"  value=" {{ $product->product_code }}">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_quantity"  value=" {{ $product->product_quantity }} ">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                      {{-- <option value=" {{ $product->category->id }} ">{{ $product->category->name }}</option> --}}
                      @foreach ($categories as $category)
                            <option value=" {{ $category->id }} "

                                    @if ( $category->id == $product->category_id ) {
                                        {{"selected"}}
                                    }
                                    @endif
                                > {{ $category->name }} </option>
                        @endforeach
                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Sub Category" name="subcategory_id">
                        @foreach ($subcategories as $subcategory)
                            <option value=" {{ $subcategory->id }} "

                                    @if ( $subcategory->id == $product->subcategory_id ) {
                                        {{"selected"}}
                                    }
                                    @endif
                                > {{ $subcategory->name }} </option>
                        @endforeach
                      </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Brands" name="brand_id">
                        <option value=" {{ $product->brand->id }} "> {{ $product->brand->name }} </option>
                        @foreach ($brands as $brand)
                            <option value=" {{ $brand->id }} "> {{ $brand->name }} </option>
                        @endforeach
                      </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="product_size" data-role="tagsinput" id="size" value=" {{ $product->product_size }}">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="product_color" data-role="tagsinput" id="color" value=" {{ $product->product_color }}">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="selling_price" value=" {{ $product->selling_price }}">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                      <textarea class="form-control" name="product_details" id="summernote">{!! $product->product_details !!}</textarea>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="video_link" value=" {{ $product->video_link }}">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image One: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_one" class="custom-file-input" >
                            <span class="custom-file-control"></span>
                            @if ($product->image_one)
                            <img src="{{ asset($product->image_one) }}" >
                            @elseif ($(this).on('change',readURL(this)))
                            <img src="#" id="one">
                            @endif
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_two" class="custom-file-input" onchange="readURL2(this);">
                            <span class="custom-file-control"></span>
                            <img src="#"  id="two">
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_three" class="custom-file-input" onchange="readURL3(this);">
                            <span class="custom-file-control"></span>
                            <img src="#"  id="three">
                        </label>
                    </div>
                </div>
              </div><!-- row -->
              <hr>
              <br><br>
              <div class="row">
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="main_slider">
                        <span>Main Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="hot_deal">
                        <span>Hot Deal</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="best_rated">
                        <span>Best Rated</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="mid_slider">
                        <span>Mid Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="hot_new">
                        <span>Hot New</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" value="1" name="trend">
                        <span>Trend</span>
                    </label>
                </div>
              </div>
              <br>
              <br>
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
       $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {

              $.ajax({
                url: "{{ url('/get/subcategory/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                var d =$('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){

                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

                });
                },
              });

            }else{
              alert('danger');
            }

              });
        });

   </script>

    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#two')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#three')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
