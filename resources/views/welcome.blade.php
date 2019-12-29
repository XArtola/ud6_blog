@extends('layouts.app')
@section('content')

<!-- Page Content -->
<div class="container">
  <div class="row">

     <!-- Post Content Column -->
     <div class="col-lg-8">
    @foreach($posts as $post)
   
      <!-- Title -->
      <h1 class="mt-4">{{$post->title}}</h1>
      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
      </p>
      <hr>
      <!-- Date/Time -->
      <p>{{$post->published_at}}</p>
      <hr>
      @isset($post->image)
      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{asset($post->image)}}" alt="">
      @endisset
      <hr>
      <p>{{$post->body}}</p>
    
    @endforeach
</div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Categories Widget -->
      <div class="card my-1">
        <h5 class="card-header bg-dark text-light">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach($categories as $category)
                <li>
                  <a href="#" class="text-dark">{{$category->name}}</a>
                </li>
                @endforeach

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<!-- /.row -->

</div>
<!-- /.container -->
@endsection