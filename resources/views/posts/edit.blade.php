@extends('layouts.app')

@section('content')
<div class="col-6 text-center mx-auto bg-dark text-light rounded">
    <form action="{{route('posts.update',$id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('posts._form')
    </form>
</div>
@endsection