@extends('layouts.app')

@section('content')
<form action="{{route('posts.update',$id)}}" method="post" enctype="multipart/form-data">
@method('PUT')
    @include('posts._form')
</form>
@endsection