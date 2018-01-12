@extends('layouts.theme')

@section('title') {{$blog->title}} @endsection

@section('content')
<div class="content">
    <div class="title m-b-md">
        {{ $blog->title }}
    </div>

    <p>{!! $blog->content !!}</p>
</div>
@endsection
