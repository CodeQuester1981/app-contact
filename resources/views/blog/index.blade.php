<x-layout>
    @auth
    @include('partials._searchblog')

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
        
        @unless (count($blog) == 0)

        @foreach ($blog as $post)
        <x-blog-card :post="$post"/> 
        @endforeach

        @else
        <p>No Blog Posts Found</p>
        @endunless
    </div>

    <div class="mt-5 p-4">
        {{ $blog->links() }}
    </div>
    @else
    <div class="mx-5">
        You are not logged in
    </div>
    @endauth
</x-layout>
