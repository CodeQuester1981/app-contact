@props(['post'])

<x-card>
    <a class="text-black text-center hover:underline decoration-cyan-700" href="/blogs/{{ $post->id }}">
        <h4 class="text-cyan-700 text-[22px]">{{ $post->blog_title }} <i class="fa-solid fa-square-arrow-up-right"></i></h4>
    </a><br />
    <div class="text-black md:grid md:grid-cols-1 gap-1 space-y-2 md:space-y-0">
        <div>
            @php
                $words = str_word_count($post->blog_body, 1);
                $limited_words = implode(' ', array_slice($words, 0, 20));
                echo $limited_words . ' ...';
            @endphp
        </div>
    </div>
</x-card>
