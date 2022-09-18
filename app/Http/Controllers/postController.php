<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\post;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = post::all();
        return view('bakend.post.index',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats= category::all();
        return view('bakend.post.add',['cats'=>$cats]);
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
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);
        //Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumImage = time().'.'.$image1->getClientOriginalExtension();
            $dest = public_path('imgs/thumb');
            $image1->move($dest,$reThumImage);
        }else{
            $reThumImage="na";
        }
        //Post Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage = time().'.'.$image2->getClientOriginalExtension();
            $dest = public_path('imgs/full');
            $image2->move($dest,$reFullImage);
        }else{
            $reFullImage="na";
        }
        $post = new Post;
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumImage;
        $post->full_img  = $reFullImage;
        $post->detail = $request->detail;
        $post->tags  = $request->tags;
        // $post->image = $reThumImage;
        $post->save();

        return redirect('admin/post/create')->with('success','Data has been added');
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
        $cats = category::all();
        $data = category::find($id);
        return view('bakend.post.update',['cats'=>$cats,'data'=>$data]);
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
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);
        //Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumImage = time().'.'.$image1->getClientOriginalExtension();
            $dest = public_path('imgs/thumb');
            $image1->move($dest,$reThumImage);
        }else{
            $reThumImage="na";
        }
        //Post Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage = time().'.'.$image2->getClientOriginalExtension();
            $dest = public_path('imgs/full');
            $image2->move($dest,$reFullImage);
        }else{
            $reFullImage="na";
        }
        $post = post::find($id);
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumImage;
        $post->full_img  = $reFullImage;
        $post->detail = $request->detail;
        $post->tags  = $request->tags;
        // $post->image = $reThumImage;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success','Data has been Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect('admin/post');
    }
}
