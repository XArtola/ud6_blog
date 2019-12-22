@extends('layouts.app')
@section('content')

<!-- Page Content -->
<div class="container">
  <div class="row">

    @foreach($posts as $post)
    <!-- Post Content Column -->
    <div class="col-lg-8">
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
      <img class="img-fluid rounded" src="{{asset('$post->image')}}" alt="">
      @endisset
      <hr>
      <p>{{$post->body}}</p>
      <!-- Post Content 
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
      <p>normal ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
      <blockquote class="blockquote">
        <p class="mb-0">blockquote ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer class="blockquote-footer">Someone famous in
          <cite title="Source Title">Source Title</cite>
        </footer>
      </blockquote>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
      <hr>
-->
      @endforeach

    </div>


  </div>






</div>
<!-- /.row -->


<!-- Sidebar Widgets Column -->
<div class="col-md-4">

  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach($categories as $category)
            <li>
              <a href="#">{{$category->name}}</a>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
<!-- /.container -->
@endsection