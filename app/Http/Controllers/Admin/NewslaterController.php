<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newslater;
use Illuminate\Http\Request;

class NewslaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newslaters = Newslater::all();
        return view('admin.newslaters.index', compact('newslaters'))->with('i');
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
            'email' => 'required|unique:newslaters|max:255'
        ]);
        $newslater = new Newslater;
        $newslater->email = $request->email;
        $newslater->save();
        $notify = array(
            'message' => 'Subscriber Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('frontend')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newslater $newslater)
    {
        $newslater->delete();
        $notify = array(
            'message' => 'Subscriber Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('newslaters.index')->with($notify);
    }
}
