<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts=Post::with('category')->get();
        return ['post'=>$Posts];
        
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
        

        $validator=Validator::make($request->all(),[
            'title'=>'required|min:2|max:100',
            'content'=>'required|min:2|max:2000',
            'sub_content'=>'required|min:2|max:1000',
            'user_id'=>'required',


        ]);


        if ($validator->fails()) {
            return response()->json([
                'message'=>'validations fails',
                'errors'=>$validator->errors()
                ],422);
             
        }

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'sub_content'=>$request->sub_content,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
            'image'=>$request->image
          

        ]);

         return ['post'=>$post];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::with('comments')->findOrFail($id);
        return ['post'=>$post];
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
        $post= Post::findOrFail($id);
        $post->update($request->all());
         return ['post'=>$post];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::findOrFail($id);
        $post->delete();
        return ['status'=>'post deleted successfully'];
    }
}
