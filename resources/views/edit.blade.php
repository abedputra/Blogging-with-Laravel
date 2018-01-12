@extends('layouts.app')

@section('title', 'Edit Blog')
@section('title-dashboard', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Add Blog</h1>
          <hr>
          <form action="store/{{ $blog->id }}" method="POST" class="">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" placeholder="Title">
            </div>

            <div class="form-group">
              <label for="slug">URL</label>
              <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}" placeholder="URL">
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control" rows="3" name="content">{{ $blog->content }}</textarea>
            </div>

            <input type="hidden" name="author" value="{{ Auth::user()->name }}">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <a href="{{action('HomeController@blog')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
          </form>
        </div>
    </div>
</div>
@endsection
