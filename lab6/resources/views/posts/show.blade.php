
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p><strong>Category:</strong> {{ $post->category->name }}</p>
        <p><strong>Description:</strong> {{ $post->description }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
