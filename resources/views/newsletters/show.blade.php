<h1>{{ $newsletter->title }}</h1>

<p>{{ $newsletter->content }}</p>

<p>Published: {{ $newsletter->published ? 'Yes' : 'No' }}</p>

<a href="{{ route('newsletters.index') }}">Back</a>
