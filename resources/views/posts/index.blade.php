 @extends('layouts.app')
@section('title')index @endsection
@section("content")

 <div class="text-center mt-4">
    <a href='{{route('posts.create')}}'><button class="btn btn-success">create</button></a>
    <a href='{{route('posts.archive')}}'><button class="btn btn-warning me-5">restore</button></a>
    {{-- {{dd($posts);}} --}}
<table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
             <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
   @foreach ($posts as $post )
 {{-- @dd($post->title)



@dd($post->myuserrelation) --}}

        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
              <td>{{$post->slug }}</td>
            <td>{{$post->user?$post->user->name:'user not found'}}</td>

            <td>{{$post->created_at->format('d-m-Y');}}</td>

            <td>
                  <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>

                 <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>

                <form class="d-inline"href=""method="post" action="{{route('posts.destory',$post->id)}}">

                    @csrf
                    @method('DELETE')

    <button type='submit' class="btn btn-danger" onclick="return confirm('Sure Want ') ">Delete</button>
</form>
            </td>
        </tr>
        @endforeach

     </tbody>
    </table>
    </table>
    {{$posts->links()}}
@endsection

