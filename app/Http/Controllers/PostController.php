<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\PostModel;

class PostController extends Controller
{
    public function AllPost()
    {
    	$post = DB::table('blogpost')->limit(10)->get();
    	return $post;
    }

    public function PostDetails($id)
    {
        $result = PostModel::where('id',$id)->get();
    	return $result;
    }

    public function MyPost($userid)
    {
        $MyPost = DB::table('blogpost')->where('user_id',$userid)->get();
        return $MyPost;
    }

    public function StorePost(Request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $one = $request->file('image')->getClientOriginalName();
        $two =  $one;
        $path = 'image' . "/" ;
        $final = $path;
        $request->file('image')->move($final, $two);
        $data['image'] = '/image/' . $two;
        $success = DB::table('blogpost')->insert($data);
        if ($success) {
            return $success;
        }
        else{
            return null;
        }
    }
    public function DeletePost($id)
    {
        $delete = DB::table('blogpost')->where('id',$id)->delete();
        return $delete;
    }

    public function UpdatePost(Request $request,$id)
    {
        $data['user_id'] = $request->user_id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $one = $request->file('image')->getClientOriginalName();
        $two =  $one;
        $path = 'image' . "/" ;
        $final = $path;
        $request->file('image')->move($final, $two);
        $data['image'] = '/image/' . $two;
        $success = DB::table('blogpost')->where('id',$id)->update($data);
        if ($success) {
            return $success;
        }
        else{
            return null;
        }
    }
    public function EditPost($id)
    {
        $result = PostModel::where('id',$id)->get();
        return $result;
    }

    public function StoreComment(Request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['post_id'] = $request->post_id;
        $data['comment'] = $request->comment;
        $data['commentator'] = $request->commentator;
        $success = DB::table('commenttables')->insert($data);
        if ($success) {
            return $success;
        }
        else{
            return null;
        }
    }
    public function GetComment($id)
    {
        $comment = DB::table('commenttables')->where('post_id',$id)->get();
        return $comment;
    }

}
