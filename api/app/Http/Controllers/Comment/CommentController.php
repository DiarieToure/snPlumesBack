<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::all();
        return ['comments'=>$comments];
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
            'name_comment'=>'required|min:2|max:100',
            'comment'=>'required|min:6|max:100'

        ]);


        if ($validator->fails()) {
            return response()->json([
                'message'=>'validations fails',
                'errors'=>$validator->errors()
                ],422);
             
        }

        $comment=Comment::create([
            'name_comment'=>$request->name_comment,
            'alphabet'=>$request->alphabet,
            'comment'=>$request->comment,
            'post_id'=>$request->post_id,


        ]);

        // return response()->json([
        //     'message'=>'Registration',
        //     'data'->$user
        // ],200);

         return ['comments'=>$comment];
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
        
        $comment=Comment::findOrFail($id);
        $comment->delete();
        return ['status'=>"Comment deleted successfully"];
    }
}
