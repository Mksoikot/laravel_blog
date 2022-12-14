<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::all();
        return view('bakend.category.index',[
            'data'=>$data,
            'title'=>'All Categories',
            'meta_desc'=>'This is meta description for all categories'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bakend.category.add');
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
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('imgs');
            $image->move($dest,$reImage);
        }
        $category = new category;
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('admin/category/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $data = category::find($id);
        return view('bakend.category.update',['data'=>$data]);
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
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('imgs');
            $image->move($dest,$reImage);
        }
        else{
            $reImage = $request->cat_image;
        }
        $category = category::find($id);
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('admin/category/'.$id.'/edit')->with('success','Data has been Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id',$id)->delete();
        return redirect('admin/category');
    }
}
