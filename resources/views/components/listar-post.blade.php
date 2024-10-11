<div>
    @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div class="">
                <a href="{{ route('posts.show', ['user' => $post->user->username, 'post' => $post]) }}">
                    <img class="w-full h-auto object-cover" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post" />
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-10">
      {{$posts -> links('')}}
    </div>
    @else
        <p class="text-center">Sigue a alguién para mostrar sus post</p>
    @endif
</div>