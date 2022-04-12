@extends('layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <form action=" {{route('products.store')}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add Product
                <a href=" {{ route('products.index') }} " class=" btn btn-sm btn-success pull-right">Back</a>
            </h6>

            <div class="form-layout mg-t-25">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code"  placeholder="Enter Product Code">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_quantity"  placeholder="Enter Produvt Quantity">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                      <option label="Choose Category"></option>
                      @foreach ($categories as $category)
                            <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                        @endforeach
                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Sub Category" name="subcategory_id">

                      </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Brands" name="brand_id">
                        <option label="Choose Brand"></option>
                        @foreach ($brands as $brand)
                            <option value=" {{ $brand->id }} "> {{ $brand->name }} </option>
                        @endforeach
                      </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="product_size" data-role="tagsinput" id="size">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="product_color" data-role="tagsinput" id="color">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="selling_price" placeholder="Enter Selling price">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                      <textarea class="form-control" name="product_details" id="summernote"></textarea>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="video_link" placeholder="Enter Video Link">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image One: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_one" class="custom-file-input" onchange="readURL(this);">
                            <span class="custom-file-control"></span>
                            <img src="#" id="one">
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
                <button class="btn btn-info mg-r-5">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href=" {{ route('products.index') }} " class="btn btn-warning">Cancel</a>
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
