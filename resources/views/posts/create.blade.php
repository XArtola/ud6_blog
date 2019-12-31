@extends('layouts.app')
@section('content')
<div class="col-6 text-center mx-auto bg-dark text-light rounded">
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @include('posts._form')
    </form>
</div>
@endsection