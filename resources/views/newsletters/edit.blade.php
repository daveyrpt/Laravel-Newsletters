<h1>Edit newsletter</h1>

<form method="post" action="{{ route('newsletters.update', $newsletter) }}">
  @csrf
  @method('patch')
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title" value="{{ $newsletter->title }}"><br>
  <br>
  <label for="content">Content:</label><br>
  <textarea id="content" name="content">{{ $newsletter->content }}</textarea><br>
  <br>
  <label for="published">Published:</label><br>
  <input type="checkbox" id="published" name="published" value="1" {{ $newsletter->published ? 'checked' : '' }}><br>
  <br>
  <button type="submit">Save</button>
</form>

<a href="{{ route('newsletters.index') }}">Cancel</a>
