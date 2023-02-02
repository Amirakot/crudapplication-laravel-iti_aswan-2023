@extends('layouts.app')
@section('title')create @endsection
@section("content")
<form class="container mt-5" action= "{{route('posts.store')}}" method='post' >
    @csrf
<div class="mb-3">
            <label class="form-label text-success">Title</label>
            <input name="title" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label text-success">Description</label>
            <textarea name="description" class="form-control"> </textarea>
        </div>
        <div class="mb-3 ">
            <label class="form-label text-success" for="exampleCheck1">Post Creator</label>
            <select name="post_creator" class="form-control ">
                <option>Ahmed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
</div>
</form>
@endsection
