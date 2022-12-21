<h1>Newsletters</h1>

<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Content</th>
      <th>Published</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($newsletters as $newsletter)
      <tr>
        <td>{{ $newsletter->title }}</td>
        <td>{{ $newsletter->content }}</td>
        <td>{{ $newsletter->published ? 'Yes' : 'No' }}</td>
        <td>
          <a href="{{ route('newsletters.edit', $newsletter) }}">Edit</a>
          <form action="{{ route('newsletters.destroy', $newsletter) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ route('newsletters.create') }}">Add newsletter</a>
