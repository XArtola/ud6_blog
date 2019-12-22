@extends('layouts.app')
@section('content')
<form action="{{route('posts.store')}}" method="post">
    @include('posts._form')
</form>
@endsection