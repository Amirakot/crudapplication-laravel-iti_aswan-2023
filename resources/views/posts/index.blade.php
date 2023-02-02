@extends('layouts.app')
@section('title')index @endsection
@section("content")

 <div class="text-center mt-4">
    <a href='{{route('posts.create')}}'><button class="btn btn-success">create</button></a>
 </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
         <tbody>
@foreach ($posts as $post )


        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['posted by']}}</td>
            <td>{{$post['created at']}}</td>
            <td>
                <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>

                <a href="{{route('posts.update',$post['id'])}}" class="btn btn-primary">Edit</a>

                <form class="d-inline"href="" action="{{route('posts.destory',['post'=>$post['id']])}}">
    @csrf
    @method('delete')
    <a href='' class="btn btn-danger" onclick="return confirm('Sure Want ') ">Delete</a>
</form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </table>
@endsection


