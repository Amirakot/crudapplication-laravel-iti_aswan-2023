@extends('layouts.app')
@section('title')create @endsection
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
            <label class="form-label  text-success" for="exampleCheck1">Post Creator</label>
            <select name="user_id" class="form-control ">

                @foreach ($users as $user )

                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
</div>
</form>


@endsection
