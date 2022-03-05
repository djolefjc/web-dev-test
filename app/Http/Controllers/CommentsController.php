<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotifyUser;
use App\Models\News;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{

  public function storeComment(Request $request)
  {

    $entity = "";
    $author = "";
    $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
    'email' => 'required|email',
    'your_comment' => 'required'
    ]);

    if($request->has('entity_type')){

      if($request['entity_type'] == 'Post'){
        $entity = Post::find($request['entity_id']);
        if ($validator->fails()) {
            return redirect('posts/'.$request['entity_id'])
                        ->withErrors($validator)
                        ->withInput();
        }
      }


      if($request['entity_type'] == 'Article'){
        $entity = News::find($request['entity_id']);
        if ($validator->fails()) {
            return redirect('news/'.$request['entity_id'])
                        ->withErrors($validator)
                        ->withInput();
        }
      }
      $comment = new Comment;
      if(!empty($request['parent_id'])){
        $parent_comment = 1;
        $comment->parent_id = $request['parent_id'];
      }
      $comment->email = $request['email'];
      $comment->name = $request['name'];
      $comment->comment = $request['your_comment'];
      $entity->comments()->save($comment);
      $author = $entity->author;

      $email_data = '<h3>You have a new comment!</h3>';
      $email_data .= '<p>
      Name:'.$author->name.'
      </p>';
      $email_data .= '<p>
      Comment:'.$comment->comment.'
      </p>';



      Mail::to($author->email)->send(new EmailNotifyUser($email_data));

      return redirect()->back()->with('message','Comment waiting for approval!');

    }else{
      $comment = Comment::find($request['comment_id']);
      $comment->email = $request['email'];
      $comment->name = $request['name'];
      $comment->comment = $request['your_comment'];
      if(str_contains($comment->entity_type,'Post')){
        $entity = Post::find($comment->entity_id);
      }elseif(str_contains($comment->entity_type,'News')){
        $entity = News::find($comment_entity_id);
      }
      $entity->comments()->save($comment);
      $author = $entity->author;



      return redirect()->back()->with('message','Comment eddited successfully!');

    }


  }

  public function index()
  {
      $comments = Comment::latest()->paginate(10);

      return view('comments.index', compact('comments'));
  }

  public function edit($id)
  {
      $comment = Comment::findOrFail($id);

      return view('comments.create', compact('comment'));
  }

  public function approve($id)
  {
    $message = '';
    $email_data = '';
    $email_parent_data = '';
    $parent_comment;
    $comment = Comment::findOrFail($id);
    if($comment->approved == 0){
      $comment->approved = 1;
      $message = 'Comment approved!';
      $email_data = '<h3>Your comment has been approved!</h3>';
      $email_data .= '<p>
      Name:'.$comment->name.'
      </p>';
      $email_data .= '<p>
      Comment:'.$comment->comment.'
      </p>';

      if(!empty($comment->parent_id)){
        $parent_comment = Comment::findOrFail($comment->parent_id);
        $email_data_parent = '<h3>Reply on your comment has been approved!</h3>';
        $email_data_parent .= '<p>
        Name:'.$parent_comment->name.'
        </p>';
        $email_data_parent .= '<p>
        Comment:'.$parent_comment->comment.'
        </p>';
      }

    }else{
      $comment->approved = 0;
      $message = 'Comment unapproved!';
    }

    if(str_contains($comment->entity_type,'Post')) {
      $post = Post::findOrFail($comment->entity_id);
      $post->comments()->save($comment);
    }elseif(str_contains($comment->entity_type,'News')) {
      $article = News::findOrFail($comment->entity_id);
      $article->comments()->save($comment);
    }
    if(!empty($email_data)){
      Mail::to($comment->email)->send(new EmailNotifyUser($email_data));
    }
    if(!empty($email_data_parent)){
      Mail::to($parent_comment->email)->send(new EmailNotifyUser($email_data_parent));
    }
    return redirect()->route('comments.index')->with('message',$message);
  }

  public function destroy($id)
  {
      Comment::destroy($id);

      return redirect()->route('comments.index')->with('success', 'Comment Deleted!');
  }

  public function show($id)
  {
    $main_comment = Comment::findOrFail($id);
    $comments = $main_comment->children();

    return view('comments.show',compact('main_comment','comments'));
  }
}
