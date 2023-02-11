<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#">ITI Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{route('posts.index')}}">All Posts</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">

<div class="card mt-5" style="width: 18rem;">
  <div class="card-header ">
    post info
  </div>
  <div class="p-3">
{{-- @dd($post) --}}
{{-- @dd($posts->title); --}}
{{-- @dd($posts) --}}
  <h4 >special statment:</h4><span>{{$posts->title}}</span>
   <h4>description:</h4><span>{{$posts->description}}</span>
  </div>

</div>
<div class="card mt-5" style="width: 18rem;">
  <div class="card-header ">
    post info
  </div>
  <div class="p-3">

  <h4 >Name:</h4><span>{{$posts->user->name}}</span>
   <h4>Createdat:</h4><span>{{$posts->created_at}}</span>
  </div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

