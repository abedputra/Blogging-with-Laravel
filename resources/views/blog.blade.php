@extends('layouts.app')

@section('title', 'List Your Blog')
@section('title-dashboard', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <a href="{{ action('HomeController@showadd') }}"><button class="btn btn-primary btn-sm">Add Blog</button></a><br>
          @if(count($allblog) > 0)
          <h1>List Your Blog</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>No.</th>
            			<th>Title</th>
                  <th>Author</th>
                  <th>Date</th>
            			<th colspan="3">Action</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php $counter = 1; ?>
                @foreach($allblog as $blog)
              		<tr>
              			<th><?php echo $counter++; ?></th>
              			<td>{{ $blog->title }}</td>
                    <td>{{ $blog->author }}</td>
                    <td>{{ $blog->updated_at }}</td>
                    <td><a href="{{ action('FrontController@showblog', $blog->slug) }}" target="_blank">View</a></td>
              			<td><a href="{{ action('HomeController@showedit', $blog->id) }}">Edit</a></td>
              			<td><a href="{{ action('HomeController@deleteblog', $blog->id) }}">Delete</a></td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
          </div>
          @else
          <br><div class="alert alert-warning" role="alert">Empty Blog! Please click Add Blog to add blog.</div>
          @endif
        </div>
    </div>
</div>
@endsection
