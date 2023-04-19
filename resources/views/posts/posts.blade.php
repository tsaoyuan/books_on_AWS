<x-layout>
{{--    @dd($post)--}}
    @foreach($posts as $post)
    <h1>
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    </h1>
    <div class="mt-4">
        <a href="posts/{{ $post->category()->id }}">{{ $post->category()->category_name }}</a>
    </div>

    <div class="mt-4">
        <p>{{ $post->excerpt }}</p>
        <a class="mt-4">-----content------</a>
        <p>{{ $post->content }}</p>
    </div>
    @endforeach
</x-layout>
