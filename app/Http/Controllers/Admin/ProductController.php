<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::get();
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
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

        if ($request->has('status')) {
            $request->request->add(['status' => 1]);

        }else{
            $request->request->add(['status' => 0]);

        }
        $product = Product::create([
            'name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status

        ]);

        if ($request->has('images')) {

            $images = $request->images;
            $i = 1;
            foreach ($images as $image){
                $filename = time().'-'.$i.'.'.$image->getClientOriginalExtension();
                $image_size = getimagesize($image);
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/admin/products/' . $filename);
                Image::make($image->path())->resize($image_size[0], null , function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_name' => $filename,
                    'image_size' => $image_size[0].'x'.$image_size[1],
                    'image_type' => $file_type,
                    'width' => $image_size[0],
                    'height' => $image_size[1],
                ]);
                $i++;
            }




        }

        return redirect()->route('admin.products.index')->with(['success' => 'تمت الاضافة بنجاح']);




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
    public function destroy($id)
    {
        //
    }
}
