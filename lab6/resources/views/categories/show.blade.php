<h1>{{ $category->name }}</h1>
<h3>Posts in this Category</h3>
<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        </li>
    @endforeach
</ul>
