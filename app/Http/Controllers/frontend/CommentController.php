<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Comment;
use Auth;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('status' , '1')->get();
        dd($comments);
        return view('admin.comment.index')->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request, $product_id)
    {
//        dd($request->all());

        $this->validate($request, array(
            'comment' => 'required|string',
        ));
        // Store in the database
        $comment = new comment();

        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $product_id;
        $comment->status = 0;
        $comment->save();

        Session::flash('success', 'the Comment was successfully Save!');
        return redirect('products/'.$product_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        $comment = Comment::find($comment_id);
        return view('frontend.comment.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->comment = $request->comment;
        $comment->update();
        Session::flash('success', 'the Comment was successfully Updated!');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Session::flash('success', 'The Comment was successfully deleted.');
        return redirect('products');

    }

    public function approve($id)
    {
        $comment = Comment::find($id);
        //dd($comment);
        $comment->status = 1;
        $comment->save();

        Session::flash('success', 'Comment Status was successfully Approved.');
        return redirect('products');

    }

    public function close($id)
    {
        $comment = Comment::find($id);
        //dd($comment);
        $comment->status = 0;
        $comment->save();

        Session::flash('success', 'Comment Status was successfully Closed.');
        return redirect('products');

    }
}
