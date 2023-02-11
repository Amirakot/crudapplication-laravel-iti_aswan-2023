 @extends('layouts.app')
@section('title')index @endsection
@section("content")

 <div class="text-center mt-4">

<table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
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
            <td>{{$post->user?$post->user->name:'user not found'}}</td>
            <td>{{$post->created_at}}</td>
            <td>

                <form class="d-inline"href=""method="post" action="{{route('posts.destory',$post->id)}}">

                    @csrf
                    @method('DELETE')

    <button type='submit' class="btn btn-danger" onclick="return confirm('Sure Want ') ">Delete</button>
</form>

            </td>
             <td>

                <form class="d-inline"href=""method="post" action="{{route('posts.restore',$post->id)}}">

                    @csrf


    <button type='submit' class="btn btn-success">Restore</button>
</form>

            </td>
        </tr>
        @endforeach

     </tbody>
    </table>
    </table>
    {{-- {{$posts->links()}} --}}
@endsection
