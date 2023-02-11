<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
// use Carbon\Carbon;


class PostController extends Controller
{





public function index(){
 $posts=post::paginate(1);
// $posts=Post::all();
// dd($posts->find(created_at));

return view('posts.index',[
    'posts'=>$posts
]);


    }


     public function archive(){
$posts=Post::onlyTrashed()->get();



//         ->orderBy('deleted_at', 'desc')->get();
// }
// $posts=$post->onlyTrashed();
// // ->paginate(5);
// $posts=Post::all();
// ->paginate(5);


return view('posts.archive',[
    'posts'=>$posts
]);

// return view('/allpost/new_archives');
//     }
    }












public function show($post){
    post::findOrFail($post);
    // dd($post);//id =1,id=2;
$post=post::find($post);

// $post=post::where('title','php')->get();//elequent collection any row is matached
// dd($post);
return view('posts.show',['posts'=>$post]);
dd($post);
    }






    public function create(){

        return view("posts.create",[
            'users'=>User::all()
        ]);
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


post::create(
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

   return redirect('allpost');
}
 public function destroy(post $post,Request $request)
{
    if($post->trashed()){
        $post->forceDelete();
        return redirect()->to('archive');
    }

$post->delete();

  return redirect()->to('allpost');
}



public function update(updatePostrequest $request, $id){
$post=post::findOrFail($id);
$data=$request->all();
// $request->validate([
//             'title' => 'required',
//             'description' => 'required',
//         ]);
    $post->update(  [
        'title'=>$data['title'],
        'description'=>$data['description'],
        'user_id'=>$data['user_id']

    ]);

// .get the request data
// 2.add to view post
// take the form submission //store in db

   return redirect(route('allpost'));}

public function restore(post $post,Request $request){
$posts=post::withTrashed()->restore();

return redirect('allpost');
// undeleted model
   $post->restore();
   redirect()->to('allpost');

}



public function edit(post $post){
// dd(request()->all());
$posts=post::all()->find($post);


    return view('posts.edit',['post'=>$posts],[
            'users'=>User::all()]);

}

}
