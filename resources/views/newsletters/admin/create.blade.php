@extends('layouts.app')
@section('content')
<div class="container">
  
  <form method="post" action="{{ route('newsletters.store') }}"> 
  @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title"><br>
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" id="content" name="content" rows="5"></textarea><br>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="published" name="published" value="1">
      <label class="form-check-label" for="published">Published</label>
      <br>
    </div>
    <button type="submit" class="btn btn-success">Add to Newsletters</button>
    <a href="{{ route('newsletters.adminindex') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
  </form>
  
</div>
@endsection

