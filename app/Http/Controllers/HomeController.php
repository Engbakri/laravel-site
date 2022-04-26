<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        $slider_image = $request->file('image');


        $name_gen = hexdec(uniqid()). '.' .$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('images/sliders/'.$name_gen);

        $last_image = 'images/sliders/'.$name_gen;


        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('sliders')->with('success','Slider Careated Successfully');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        $old_image = $request->old_image;
        $slider_image = $request->file('image');


        $name_gen = hexdec(uniqid()). '.' .$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('images/sliders/'.$name_gen);

        $last_image = 'images/sliders/'.$name_gen;

        unlink($old_image);
        Slider::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('sliders')->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $image_delete = $slider->image;

        unlink($image_delete);
        $slider->delete();
        return redirect()->route('sliders')->with('success','Slider Deleted Successfully');
    }
}
