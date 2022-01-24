<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'))->with('i');
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
        $validation = $request->validate([
            'name' => 'required|unique:brands|max:255'
        ]);

        $image = $request->file('barnd_logo');
        $file_name = date('YmdHis'). '.' .strtolower($image->getClientOriginalExtension());
        $upload_path = 'media/brand/';
        $image_url = $upload_path.$file_name;
        $uploaded = $image->move($upload_path,$file_name);

        $brands = New Brand;
        $brands->name = $request->name;
        $brands->barnd_logo = $image_url;
        $brands->save();
        $notify = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('brands.index')->with($notify);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->name;
        if(!empty($request->file('barnd_logo'))) {
            $image = $request->file('barnd_logo');
            $file_name = date('YmdHis'). '.' .strtolower($image->getClientOriginalExtension());
            $upload_path = 'media/brand/';
            $image_url = $upload_path.$file_name;
            $uploaded = $image->move($upload_path,$file_name);
            $brand->barnd_logo = $image_url;
        }
        $brand->update();
        $notify = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('brands.index')->with($notify);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        $notify = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('brands.index')->with($notify);
    }
}
