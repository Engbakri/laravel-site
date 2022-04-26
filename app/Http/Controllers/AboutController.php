<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();

        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        About::insert([
            'about_title' => $request->about_title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('abouts')->with('success','About Careated Successfully');
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
        $about = About::find($id);

        return view('admin.about.edit',compact('about'));
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
        About::find($id)->update([
            'about_title' => $request->about_title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('abouts')->with('success','About Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();
        return redirect()->route('abouts')->with('success','About Deleted Successfully');
    }
}
