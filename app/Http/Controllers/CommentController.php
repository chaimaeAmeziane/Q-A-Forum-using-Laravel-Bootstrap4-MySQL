<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Comment;
use Illuminate\Http\Request;
use App\Notifications\NewCommentPosted;

class CommentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');

    }
    public function store(Topic $topic)
    {
       request()->validate([
       	'content' => 'required|min:4'
       ]);
       $comment= new Comment();
       $comment->content = request('content');
       $comment->user_id = auth()->user()->id;

       //ca nous permettera de remplir les champs de la relation polymorphique

       $topic->comments()->save($comment);

       // Notification 
       $topic->user->notify(new NewCommentPosted($topic,auth()->user()));


       return redirect()->route('topics.show',$topic);

    }
    public function storeCommentReply(Comment $comment)
    {
       request()->validate([
       	'replyComment' => 'required|min:3'
       ]);
       $commentReply = new Comment();
       $commentReply->content = request('replyComment');
       $commentReply->user_id = auth()->user()->id;
       $comment->comments()->save($commentReply);

       return redirect()->back();
    }
}
