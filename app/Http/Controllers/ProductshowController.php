<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data['main_slider'] = Product::where('main_slider', 1)->first();
        $data['hot_deal'] = Product::where('hot_deal', 1)->get();
        $data['best_rated'] = Product::where('best_rated', 1)->get();
        $data['mid_slider'] = Product::where('mid_slider', 1)->first();
        $data['hot_new'] = Product::where('hot_new', 1)->get();
        $data['trend'] = Product::where('trend', 1)->get();
        return view('forntend.index', compact('products', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('forntend.show', compact('product'));
    }

    public function cart()
    {
        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        $quantity = $request->quantity;

        if(isset($cart[$id])) {
            if ($quantity) {
                $cart[$id]['quantity']+= $quantity;
            } else {
                $cart[$id]['quantity']++;
            }

        } else {
            if ($quantity) {
                $cart[$id] = [
                    "name" => $product->product_name,
                    "quantity" => $quantity,
                    "price" => $product->selling_price,
                    "image" => $product->image_one
                ];
            } else {
                $cart[$id] = [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->selling_price,
                    "image" => $product->image_one
                ];
            }

        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
