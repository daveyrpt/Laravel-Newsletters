<h1>Create newsletter</h1>

<form method="post" action="{{ route('newsletters.store') }}">
  @csrf
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title"><br>
  <br>
  <label for="content">Content:</label><br>
  <textarea id="content" name="content"></textarea><br>
  <br>
  <label for="published">Published:</label><br>
  <input type="checkbox" id="published" name="published" value="1"><br>
  <br>
  <button type="submit">Save</button>
</form>

<a href="{{ route('newsletters.index') }}">Cancel</a>
