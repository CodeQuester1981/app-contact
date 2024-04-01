<x-layout>
    <x-card class="">
        <h2 class="text-2xl font-bold uppercase mb-4 text-center">{{ $blog->blog_title }}</h2>
        @foreach ([
            $blog->blog_body
        ] as $value)
            <div class="flex justify-center md:grid md:grid-cols-1 text-center">
                <p>{{ $value }}</p>
            </div>
        @endforeach
    </x-card>
</x-layout>