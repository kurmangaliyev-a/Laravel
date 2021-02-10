<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostApiController extends Controller
{
    //
    public function getData(){
        return ["name"=>'aza'];
    }
    public function getAllPosts(){
        $posts = Post::all();
        $headers = [  ];
        return response()->json($posts);
//            ->header('Content-Type', 'application/json; charset=utf-8');

    }
    public function getPost($id){
        if($id==null){
            $response = ['response'=>'Пост c ip '.$id.' не существует, или был удалён с сервера'];
            return response()->json($response,404);
        }
        $post = Post::find($id);
        if(!isset($post)){
            $response = ['response'=>'Пост c ip '.$id.' не существует, или был удалён с сервера'];
                return response()->json($response,404);
        }
        return response()->json($post,200);
    }
    public function addPost(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title)>30 ? Str::substr($request->title,0,30).'...' : $request->title;
        $post->descr = $request->descr;
        $post->author_id = rand(1,5);
        if ($request->file('img')){
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }
        $post->save();
        return response()->json(["Result"=>"Data has been saved"],201);
    }
    public function updatePost(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->descr = $request->descr;
        $result = $post->save();
        if($result){
            return response()->json(["Result"=>"Data has been updated"],200);
        }else{
            return response()->json(["Result"=>"Update operation has been failed"],406);
        }
    }
    public function searchPost($str){
        $posts = Post::join('users','author_id','=','users.id')
            ->where('title','like', '%'.$str.'%')
            ->orWhere('descr','like', '%'.$str.'%')
            ->orWhere('users.name','like', '%'.$str.'%')
            ->orderBy('posts.created_at','desc')->get();
        return response()->json($posts);
    }
    public function deletePost($id){

        $post = Post::find($id);
        if(!isset($post)){
            return response()->json(["Result"=>"Delete operation has been failed ".$id],404);

        }
        $result = $post->delete();
        if($result){
            return response()->json(["Result"=>"Data has been deleted ".$id],200);
        }else{
            return response()->json(["Result"=>"Delete operation has been failed ".$id],406);
        }

    }
}
