<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validator;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'post_id' => 'required',
            'text' => 'required'
        ]);

        $return_id = $validatedData['user_id'];

        // Add a new comment
        $comment = new Comment;
        $comment->text = $validatedData['text'];
        $comment->post_id = $validatedData['post_id'];
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return Redirect::back();
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
    public function edit($id, Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->text = $validatedData['text'];
        $comment->save();

        return Redirect::back();
        

        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'text' => 'required'
        // ]);

        // dd($validatedData);

        // $return_id = $validatedData['user_id'];

        // $comment = Comment::findOrFail($id);
        // $comment->update(['text'->$validatedData['texts']]);

        // return redirect()->route('users.show', ['id'=>$return_id]);
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
    public function destroy(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->delete();
        return Redirect::back();
    }

    // AJAX test
    public function page()
    {
        return view('comments.index');
    }

    public function apiIndex()
    {   
        $comments = Comment::all();
        return $comments;
    }

    public function apiStore(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'post_id' => 'required',
        //     'text' => 'required'
        // ]);

        // dd($validatedData);

        // Add a new comment
        $comment = new Comment;
        $comment->text = $request['text'];
        $comment->post_id = 1;
        $comment->user_id = 1;
        $comment->save();

        // $comment->text = $validatedData['text'];
        // $comment->post_id = $validatedData['post_id'];
        // $comment->user_id = $validatedData['user_id'];


        return $comment;
    }
}
