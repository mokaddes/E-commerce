<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        $categories = Category::all();
        $counts = Category::count();
        return view('admin.categories.index', compact('categories', 'counts'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|unique:categories|max:255'
        ]);

        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();

        // $data = array();
        // $data['name']=$request->name;
        // DB::table('categories')->insert($data);
        $notify = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->update();
        $notify = array(
            'message' => 'Category Edited Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notify = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('categories.index')->with($notify);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        if ($request->keyword != '') {
            $categories = Category::where('name','LIKE','%'.$request->keyword.'%')->get();

            return response()->json([
                'categories' => $categories
            ]);
        }
    }
}
