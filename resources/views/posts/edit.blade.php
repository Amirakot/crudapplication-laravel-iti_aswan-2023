@extends('layouts.app')


@section("content")
  @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="container mt-5" action= "{{route('posts.update',['post'=>$post['id']])}}" method='post' >
{{-- @dd($post) --}}
    @csrf
@method('PUT')
    <div class="mb-3">
            <label class="form-label text-success">Title</label>
            <input name="title" type="text" value="{{$post->title}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label text-success">Description</label>
            <textarea name="description" class="form-control">{{$post->description}}  </textarea></div>


        <div class="mb-3 ">
            <label class="form-label text-success" for="exampleCheck1">Post Creator</label>
            <select name="user_id" class="form-control ">
               @foreach ($users as $user )
{{-- dd($user); --}}
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">update</button>
</div>
</form>
@endsection
