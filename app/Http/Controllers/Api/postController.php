<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\postresource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
class postController extends Controller
{
    public function index(){
    $posts= Post::all();
  return  postresource::collection($posts);




}
    public function show($postid){
        $post= Post::find($postid);
        return new postresource($post);
    }
public function store(Request $request  ){
$request->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:5'],
        ],[
            'title.required'=>'must be required ',
            'title.min'=>'must be 3 character '
        ]);

$data=$request->all();


$post=post::create(
    [
        'title'=>$data['title'],
        'description'=>$data['description'],
        'user_id'=>$data['user_id'],
        'slug'=>Str::slug($request->title)
    ]

    );
// .get the request data
// 2.add to view post
// take the form submission //store in db
return $post;

}
}
