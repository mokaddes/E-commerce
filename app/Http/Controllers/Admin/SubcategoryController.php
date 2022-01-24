<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategories.index', compact('subcategories', 'categories'))->with('i');
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
        $validateData = $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255'
        ]);

        $subcategories = new Subcategory;
        $subcategories->category_id = $request->category_id;
        $subcategories->name = $request->name;
        $subcategories->save();

        $notify = array(
            'message' => 'Sub Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategories.index')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->update();
        $notify = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategories.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        $notify = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('subcategories.index')->with($notify);
    }
}
