<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Storage;
// use Faker\Provider\Image;
// use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
// use Intervention\Image\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products'
        ]);
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_details = $request->product_details;
        $product->product_quantity = $request->product_quantity;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->status = 1;

        $image1 = $request->file('image_one');
        $image2 = $request->file('image_two');
        $image3 = $request->file('image_three');

        if ($image1) {

            $image_one_name = hexdec(uniqid()). '.' .$image1->getClientOriginalExtension();
            Image::make($image1)->resize(300,300)->save('media/products/'.$image_one_name);
            $product->image_one = 'media/products/'.$image_one_name;
        }
        if ($image2) {
            $image_two_name = hexdec(uniqid()). '.' .$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300,300)->save('media/products/'.$image_two_name);
            $product->image_two = 'media/products/'.$image_two_name;
        }
        if ($image3) {
            $image_three_name = hexdec(uniqid()). '.' .$image3->getClientOriginalExtension();
            Image::make($image3)->resize(300,300)->save('media/products/'.$image_three_name);
            $product->image_three = 'media/products/'.$image_three_name;
        }

        $product->save();
        $notify = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notify);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $request->validate([
        //     'product_code' => 'required|unique:products'
        // ]);

        $old_image1 = $request->old_one;
        $old_image2 = $request->old_two;
        $old_image3 = $request->old_three;
        // unlink($old_image1);
        // unlink($old_image2);
        // unlink($old_image3);

        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->discount_price = $request->discount_price;
        $product->product_details = $request->product_details;
        $product->product_quantity = $request->product_quantity;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->status = 1;

        $image1 = $request->file('image_one');
        $image2 = $request->file('image_two');
        $image3 = $request->file('image_three');

        if ($image1) {

            $image_one_name = hexdec(uniqid()). '.' .$image1->getClientOriginalExtension();
            Image::make($image1)->resize(300,300)->save('media/products/'.$image_one_name);
            $product->image_one = 'media/products/'.$image_one_name;

            if ($old_image1) {
                unlink($old_image1);
            }
        }
        if ($image2) {
            $image_two_name = hexdec(uniqid()). '.' .$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300,300)->save('media/products/'.$image_two_name);
            $product->image_two = 'media/products/'.$image_two_name;

            if ($old_image2) {
                unlink($old_image2);
            }
        }
        if ($image3) {
            $image_three_name = hexdec(uniqid()). '.' .$image3->getClientOriginalExtension();
            Image::make($image3)->resize(300,300)->save('media/products/'.$image_three_name);
            $product->image_three = 'media/products/'.$image_three_name;

            if ($old_image3) {
                unlink($old_image3);
            }
        }



        $product->update();
        $notify = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $image1 = $product->image_one;
        // $image2 = $product->image_two;
        // $image3 = $product->image_three;
        // unlink($image1);
        // unlink($image2);
        // unlink($image3);
        // // Storage::delete([asset($image1), asset($image2), asset($image3)]);
        // $product->delete();
        // $notify = array(
        //     'message' => 'Product Deleted',
        //     'alert-type' => 'success'
        // );
        // return redirect()->route('products.index')->with($notify);
        dd($product->product_name);
    }

    public function delete(Product $product)
    {
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);

        $product->delete();
        $notify = array(
            'message' => 'Product Deleted',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notify);
    }

    public function inactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status'=>0]);
        $notify = array(
            'message' => 'Product Status Inactivated',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notify);
    }

    public function active($id)
    {
        Product::where('id', $id)->update(['status'=>1]);
        $notify = array(
            'message' => 'Product Status Activated',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notify);
    }


}
