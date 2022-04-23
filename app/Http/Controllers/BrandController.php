<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ParagonIE\ConstantTime\Hex;
use Image;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function Logout(){
       Auth::logout();
       return redirect()->route('login');
    }
    
    public function index()
    {
        $brands = Brand::latest()->paginate(5);

        return view('admin.brand.index',compact('brands'));
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
        $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $image_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen. '.' .$image_ext;
        // $upload_location = 'images/brands/';
        // $last_image = $upload_location.$img_name;
        // $brand_image->move($upload_location,$img_name);

        $name_gen = hexdec(uniqid()). '.' .$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('images/brands/'.$name_gen);

        $last_image = 'images/brands/'.$name_gen;


        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('brands')->with('success','Category Careated Successfully');
        
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
        $brand = Brand::find($id);

        return view('admin.brand.edit',compact('brand'));
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
        // $request->validate([
        //     'brand_name' => 'required|min:10',
           
        // ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
     

        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen. '.' .$image_ext;
        $upload_location = 'images/brands/';
        $last_image = $upload_location.$img_name;

        $brand_image->move($upload_location,$img_name);
        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('brands')->with('success','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Brand::find($id);

        $old_image = $image->brand_image;

        unlink($old_image);

        Brand::find($id)->delete();

        return redirect()->route('brands')->with('success','Brand Deleted Successfully');

    }

    public function AllImages()
    {
        $BrandImages = MultiImage::all();

        return view('admin.multimages.index',compact('BrandImages'));
    }
     public function storeImages(Request $request)
     {

        $image = $request->file('image');

        foreach($image as $multi){

        $name_gen = hexdec(uniqid()). '.' .$multi->getClientOriginalExtension();
        Image::make($multi)->resize(300,300)->save('images/multimages/'.$name_gen);

        $last_image = 'images/multimages/'.$name_gen;


        MultiImage::insert([
            'image' => $last_image,
            'created_at' => Carbon::now(),

        ]);
            }
        return redirect()->route('brands')->with('success','Category Careated Successfully');

     }
}
